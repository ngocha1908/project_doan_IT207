@component('mail::message')
Hello, {{ $user->fullname }}

Weekly sales report

Last week, sales is {{ number_format($orders) }} vnđ.

@component('mail::button', ['url' => route('admin.orders.index')])
Orders management
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
