@foreach($notificationUserId->notifications as $notification)
    <a class="dropdown-item" href="#">
        <div class="d-flex align-items-center">
            <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="52" height="52">
            <div class="ms-3 flex-grow-1">
                <h6 class="mb-0 dropdown-msg-user">{{$notification->data['title']}} <span class="msg-time float-end text-secondary">1 m</span></h6>
                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
            </div>
        </div>
    </a>
@endforeach
