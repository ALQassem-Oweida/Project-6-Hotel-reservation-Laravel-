<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class room extends Model
{
  use HasFactory;

  protected $fillable =
  [
    'cat_name', 'num_of_beds', 'room_price',
    'status', 'room_img', 'room_description', 'name'
  ];


  public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(category::class);
  }

  public function reviews()
  {
    return $this->hasMany(review::class);
  }


  public function bookForUser($userId, $roomId, $start_date, $end_date, $price)
  {

    //1. check the room availability

    if ($end_date <= $start_date) {
      abort(403, "invalid date");
    }

    $from = $start_date->toDateString();
    $to = $end_date->toDateString();


    $diff = $start_date->diffInDays($end_date);

    $totalPrice = ($diff * $price);
    $tax = $totalPrice * 16 / 100;
    $finalAmount =  $tax + $totalPrice;


    $reserved = Booking::where('room_id', $roomId)
      ->where('checkIn_date', '<=', $from)
      ->where('checkOut_date', '>=', $to)
      ->orWhereBetween('checkOut_date', [$from, $to])
      ->count();

    $reserved2 = Booking::where('room_id', $roomId)
      ->whereBetween('checkIn_date', [$from, $to])->count();



    // Show results of log

    if ($reserved2 > 0 || $reserved > 0)

      abort(403, "The room is not available for this date. Please selected different date.");


    //2. Book the room

    $booking = new Booking();
    $booking->user_id = $userId;
    $booking->room_id = $roomId;
    $booking->totalAmount = $finalAmount;
    $booking->checkIn_date = $from;
    $booking->checkOut_date = $to;

    $booking->save();

    return $booking;
  }
}
