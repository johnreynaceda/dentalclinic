<div>
    <h1>Total Remaining <span
            class="font-bold text-red-600">&#8369;{{ number_format($getRecord()->total_fee - $getRecord()->appointmentPayments->sum('paid_amount'), 2) }}</span>
    </h1>
</div>
