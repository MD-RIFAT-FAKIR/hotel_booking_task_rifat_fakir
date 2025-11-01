<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    //booking form
    public function bookingForm() {
        return view('hotel_booking_form');
    }



    //check available room
    public function checkAvailability(Request $request) {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required|regex:/^01[0-9]{9}$/',
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);
        $categories = RoomCategory::all();
        $availableCategories = [];

        foreach ($categories as $category) {
            $available = true;
            $basePrice = 0;
            $finalPrice = 0;
            $days = 0;

            $date = $from->copy();
            while ($date <= $to) {
                $booked = Booking::where('room_category_id', $category->id)
                    ->whereDate('from_date', '<=', $date)
                    ->whereDate('to_date', '>=', $date)
                    ->count();

                if ($booked >= 3) {
                    $available = false;
                    break;
                }

                //price will increase if the day is friday or saturday
                $price = $category->base_price;
                if ($date->isFriday() || $date->isSaturday()) {
                    $price += (20 / 100 ) * $price; // weekend surcharge +20%
                }

                $basePrice += $category->base_price;
                $finalPrice += $price;
                $days++;
                $date->addDay();
            }

            //if rent for more than or equal 3 day the get 10% discount
            if ($days >= 3) {
                $discount = (10 / 100) * $finalPrice; // 10% of total price
                $finalPrice -= $discount;
            }

            $availableCategories[] = [
                'category' => $category,
                'available' => $available,
                'base_price' => round($basePrice),
                'final_price' => round($finalPrice),
            ];
        }

        // Return availability view
        return view('availability', [
            'availableCategories' => $availableCategories,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);
    }// end check available room

    //store booking details in database
    public function confirmBooking(Request $request) {

        $booking = Booking::create([
            'room_category_id' => $request->room_category_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('booking.thankyou', $booking->id);
    }//end store booking details in database



    //thank you page
     public function thankYou($id)
    {
        $booking = Booking::with('roomCategory')->findOrFail($id);
        return view('thankyou', compact('booking'));
    }
}
