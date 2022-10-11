@component('mail::message')
    # Opgegeven activiteiten.

    {{ Auth::user()->name; }}, 
    Hier ziet u een overzicht van de door jouw opgegeven activiteiten voor evenement: <br>
    {{ $mailInfo[1]->event->name }}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ronde</th>
                <th scope="col">Student</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mailInfo as $info)
                <tr>
                    <td>activity: {{ $info->activity->name }}</td>
                    <td>user: {{ $info->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endcomponent
