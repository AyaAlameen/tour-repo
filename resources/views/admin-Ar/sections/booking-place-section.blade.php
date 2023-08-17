<?php $i = 1; ?>
@foreach ($bookings as $booking)
    @if ($loop->last)
    <div class="products-row">
        <!-- بداية البيانات -->
        <div class="product-cell">
            <span>{{$i++}} </span>
        </div>
        <div class="product-cell">
            <span>{{$booking->model->translations()->where('locale', 'ar')->first()->name}} </span>
        </div>

        <div class="product-cell">
            <span>{{$booking->full_name}}</span>
        </div>
        <div class="product-cell">
            <span>{{$booking->people_count}}</span>
        </div>

        <div class="product-cell">
            <span>{{$booking->cost}}</span>
        </div>
        <div class="product-cell">
            <span>{{$booking->people_count * $booking->cost}} </span>
        </div>
        <div class="product-cell">
            <span>{{$booking->start_date}}</span>
        </div>
        <!-- نهاية البيانات -->

    </div>
    @else
    <div class="products-row">
        <!-- بداية البيانات -->
        <div class="product-cell">
            <span>{{$i++}} </span>
        </div>
        <div class="product-cell">
            <span>{{$booking->model->translations()->where('locale', 'ar')->first()->name}} </span>
        </div>

        <div class="product-cell">
            <span>{{$booking->full_name}}</span>
        </div>
        <div class="product-cell">
            <span>{{$booking->people_count}}</span>
        </div>

        <div class="product-cell">
            <span>{{$booking->cost}}</span>
        </div>
        <div class="product-cell">
            <span>{{$booking->people_count * $booking->cost}} </span>
        </div>
        <div class="product-cell">
            <span>{{$booking->start_date}}</span>
        </div>
        <!-- نهاية البيانات -->

    </div>
    @endif
@endforeach
