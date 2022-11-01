@if (session('failedUsers'))
    <?php $failedUsers = session('failedUsers'); ?>
@endif
@if (session('errors'))
    <?php $errors = session('errors'); ?>
@endif

@if ((!empty($failedUsers) && count($failedUsers) >= 1) || (!empty($errors) && (is_string($errors) || count($errors) > 0)))
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @if (is_string($errors))
                <li>{{ $errors }}</li>
            @elseif (is_array($errors))
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @elseif ($errors->count() > 0)
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif

            @if (is_array($failedUsers) && count($failedUsers) > 0)
                @foreach ($failedUsers as $failedUser)
                    <li>Contact met naam: {{ $failedUser['contact']->displayName() }}, kon niet worden aangemaakt door errors:
                        @if ($failedUser['errors'] instanceof Illuminate\Support\MessageBag)
                            @foreach ($failedUser['errors']->messages() as $key => $errorMessages)
                                @foreach ($errorMessages as $message)
                                    @if (end($errorMessages) === $message)
                                    {{  rtrim($message,'.') }}.
                                    @else
                                    {{  rtrim($message,'.') }},
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($failedUser['errors'] as $key => $errorMessages)
                                @if (end($failedUser['errors']) === $errorMessages)
                                {{  rtrim($errorMessages,'.') }}.
                                @else
                                {{  rtrim($errorMessages,'.') }},
                                @endif
                            @endforeach
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endif
