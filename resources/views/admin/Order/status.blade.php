@extends('adminmodule::layouts.master')

@section('title',translate('Booking_Status'))

@push('css_or_js')

@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title">{{translate('Booking_Details')}} </h2>
                    </div>

                    <ul class="nav nav--tabs nav--tabs__style2 mb-4">
                        <li class="nav-item">
                            <a class="nav-link {{$web_page=='details'?'active':''}}"
                               href="{{url()->current()}}?web_page=details">{{translate('details')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$web_page=='status'?'active':''}}"
                               href="{{url()->current()}}?web_page=status">{{translate('status')}}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="order_details_status">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border-bottom pb-3">
                                        <div class="row pb-1 gy-2">
                                            <div class="col-6 col-lg-3">
                                                <div>
                                                    <h4 class="c1 mb-2 pb-1">{{translate('Booking_Placed')}}</h4>
                                                    <p class="opacity-75">{{date('d-M-Y h:ia',strtotime($booking->created_at))}}</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div>
                                                    <h4 class="c1  mb-2 pb-1">{{translate('Booking_Status')}}</h4>
                                                    <p class="opacity-75">{{$booking->booking_status}}</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div>
                                                    <h4 class="c1  mb-2 pb-1">{{translate('Payment_Status')}}</h4>
                                                    <p class="opacity-75">{{$booking->is_paid ? 'Paid' : 'Unpaid'}}</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div>
                                                    <h4 class="c1  mb-2 pb-1">{{translate('Booking_Amount')}}</h4>
                                                    <p class="opacity-75">{{with_currency_symbol($booking->total_booking_amount)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-between mt-5">
                                        <div class="col-md-6 col-xl-4 mb-5 mb-md-0">
                                            <!-- Process Steped Timeline -->
                                            <div class="timeline-wrapper">
                                                <div class="timeline-steps">
                                                    <div class="timeline-step completed">
                                                        <div class="timeline-number">
                                                            <svg viewBox="0 0 512 512" width="100" title="check">
                                                                <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                                            </svg>
                                                        </div>
                                                        <div class="timeline-info">
                                                            <p class="timeline-title text-uppercase">{{translate('Pending')}}</p>
                                                            <p class="timeline-text">{{date('d-M-Y h:ia',strtotime($booking->created_at))}}</p>
                                                            <p class="timeline-text">By - {{isset($booking->customer) ? Str::limit($booking->customer->first_name.' '.$booking->customer->last_name, 30):translate('Not_Available')}}</p>
                                                        </div>
                                                    </div>
                                                    @foreach($booking->status_histories as $status_history)
                                                        <div class="timeline-step completed">
                                                            <div class="timeline-number">
                                                                <svg viewBox="0 0 512 512" width="100" title="check">
                                                                    <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                                                </svg>
                                                            </div>
                                                            <div class="timeline-info">
                                                                <p class="timeline-title text-uppercase">{{$status_history->booking_status}}</p>
                                                                <p class="timeline-text">{{date('d-M-Y h:ia',strtotime($status_history->created_at))}}</p>
                                                                <p class="timeline-text">By - {{isset($status_history->user) ? Str::limit($status_history->user->first_name.' '.$status_history->user->last_name, 30):''}}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Process Steped Timeline -->
                                        </div>
                                        <div class="col-md-6 col-xl-4 d-flex justify-content-center">
                                            <div class="d-flex flex-column gap-30">
                                                <div class="c1-light-bg radius-10 py-3 px-4">
                                                    <h4 class="mb-2">{{translate('Lead_Service_Information')}}</h4>
                                                    <h5 class="c1 mb-2">{{Str::limit($booking->serviceman && $booking->serviceman->user ? $booking->serviceman->user->first_name.' '.$booking->serviceman->user->last_name:'', 30)}}</h5>
                                                    <ul class="list-info">
                                                        <li>
                                                            <span class="material-icons">phone_iphone</span>
                                                            <a href="tel:{{$booking->serviceman && $booking->serviceman->user ? $booking->serviceman->user->phone:''}}">
                                                                {{$booking->serviceman && $booking->serviceman->user ? $booking->serviceman->user->phone:''}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="c1-light-bg radius-10 py-3 px-4">
                                                    <h4 class="mb-2">{{translate('Provider_Information')}}</h4>
                                                    <h5 class="c1 mb-2">{{isset($booking->provider) ? Str::limit($booking->provider->contact_person_name, 30) : ''}}</h5>
                                                    <ul class="list-info">
                                                        <li>
                                                            <span class="material-icons">phone_iphone</span>
                                                            <a href="tel:{{isset($booking->provider) ? $booking->provider->contact_person_phone : ''}}">
                                                                {{isset($booking->provider) ? $booking->provider->contact_person_phone : ''}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <span class="material-icons">map</span>
                                                            <p>{{isset($booking->provider) ? Str::limit($booking->provider->company_address, 30) : ''}}</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="changeScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('admin.booking.schedule_update',[$booking->id])}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeScheduleModalLabel">{{translate('Change_Booking_Schedule')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="datetime-local" id="service_schedule" name="service_schedule" value="{{$booking->service_schedule}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{translate('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{translate('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')


@endpush
