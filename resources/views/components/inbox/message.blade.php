@props(['message'])

<div class="cursor-pointer shadow-none toggle-off" data-inbox="message">
    <div class="d-flex align-items-center card-spacer-x py-6">
        <span class="symbol symbol-50 mr-4 symbol-dark-avatar">
            <span class="symbol-label font-size-h5 font-weight-bold text-primary">{{ substr($message->user->name(), 0, 1) }}</span>
            {{-- <span class="symbol-label" style="background-image: url('assets/media/users/100_13.jpg')"></span> --}}
        </span>
        <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
            <div class="d-flex">
                <a href="#" class="font-size-lg font-weight-bolder text-white-85 text-hover-primary mr-2">{{ $message->user->name() }}</a>
                <div class="font-weight-bold text-muted-slate">
                <span class="label label-success label-dot mr-2"></span>{{ $message->created_at->diffForHumans() }}</div>
            </div>
            <div class="d-flex flex-column">
                <div class="toggle-off-item">
                    <span class="font-weight-bold text-muted-slate cursor-pointer" data-toggle="dropdown">to me
                    <i class="flaticon2-down icon-xs ml-1 text-muted-slate"></i></span>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left p-5 dropdown-menu-dark-theme">
                        <table>
                            <tr>
                                <td class="text-muted-slate min-w-75px py-2">From</td>
                                <td class="text-white-85">{{ $message->user->name() }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted-slate py-2">Date:</td>
                                <td class="text-white-85">{{ $message->created_at->format('M d, Y, h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-muted-slate font-weight-bold toggle-on-item" data-inbox="toggle">{{ Str::limit(strip_tags($message->message), 80) }}</div>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="font-weight-bold text-muted-slate mr-2">{{ $message->created_at->format('M d, h:i A') }}</div>
        </div>
    </div>
    <div class="card-spacer-x py-3 toggle-off-item" style="background-color: #1B2538; border: 1px solid #2D3748;">
        <div class="text-white-85 font-size-lg">
            {!! clean($message->message) !!}
        </div>
        @if($message->ticketAttachment)
            <div class="separator separator-dashed my-5" style="border-bottom-color: #2D3748;"></div>
            <div class="d-flex align-items-center bg-light-primary rounded p-5" style="background-color: rgba(56, 189, 248, 0.05); border: 1px dashed rgba(56, 189, 248, 0.3);">
                <span class="svg-icon svg-icon-3x svg-icon-primary mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </span>
                
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <span class="font-weight-bold text-white-85 font-size-lg mb-1">
                        {{ $message->ticketAttachment->filename }}
                    </span>
                    <span class="text-muted-slate font-weight-bold">
                        Attached File
                    </span>
                </div>

                <a href="{{ route('tickets.attachments.download', [$message->ticket_id, $message->ticketAttachment->id]) }}" class="btn btn-sm btn-dark-outline font-weight-bolder py-2 px-5">
                    Download
                </a>
            </div>
        @endif
    </div>
</div>