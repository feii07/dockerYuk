<div>
    @if(auth()->user() != null)
    <div class="row justify-content-center" wire:poll="mount">
        @if(auth()->user()->role == 'admin')
            <div class="col-md-4">
                <div class="card Head" >
                    <div class="card-header HeadAdmin">
                        Admin {{ auth()->user()->name }}
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush" wire:poll="render">
                            @foreach($users as $user)
                                @php
                                    $not_seen = \App\Domain\Communication\Entity\Service::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                @endphp
                                <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                    <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                        <img class="img-fluid avatar" src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                                        @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif {{ $user->name }}
                                        @if(filled($not_seen))
                                            <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    @if(isset($clicked_user)) {{ $clicked_user->name }}

                    @elseif(auth()->user()->role == 'admin')
                        Select a user to see the chat
                    @elseif($admin->is_online)
                        <i class="fa fa-circle text-success"></i> We are online
                    @else
                        Messages
                    @endif
                </div>
                    <div class="card-body message-box" style="overflow:auto">
                        @if(!$messages)
                            No messages to show
                        @else
                            @if(isset($messages))
                                @foreach($messages as $message)
                                    <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                        <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                        {{ $message->message }}
                                        <br><small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                                    </div>
                                @endforeach
                            @else
                                No messages to show
                            @endif
                            @if(!isset($clicked_user) and auth()->user()->role == 'admin')
                                Click on a user to see the messages
                            @endif
                        @endif
                    </div>
                @if(auth()->user()->role != 'admin')
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage">
                            <div class="row">
                                <div class="col-md-8">
                                    <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" required>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
    </div>
    @endif
</div>
