<div class="mt-4">
    <form action="update_businesshours" method="POST">
        @csrf
        @foreach($buisnesshours as $bh)
        @if($loop->first)
        <input type="hidden" value="{{ $bh->post->id }}" name="post_id">
        <input name="post_title" class="form-control" type="text" placeholder="Titel" value="{{ $bh->post->title }}">
        <input name="post_subtitle" class="form-control" type="text" placeholder="Untertitel" value="{{ $bh->post->subtitle }}">
        <textarea name="post_text" class="form-control" type="text" placeholder="Text" value="{{ $bh->post->text }}">{{ $bh->post->text }}</textarea>
        @endif
        @endforeach
        <div class="mt-2">
            <table>
                @foreach($buisnesshours as $bh)
                @if($loop->iteration % 2 != 0 || $loop->iteration == 1)
                <tr>
                    <td>{{ $bh->hours->weekday }}</td>
                    <td><input name="start_{{ $bh->hours->weekday }}_morning" type="text" value="{{ $bh->hours->start }}"> bis <input name="end_{{ $bh->hours->weekday }}_morning" type="text" value="{{ $bh->hours->end }}"></td>
                    @else 
                    <td><input name="start_{{ $bh->hours->weekday }}_afternoon" type="text" value="{{ $bh->hours->start }}"> bis <input name="end_{{ $bh->hours->weekday }}_afternoon" type="text" value="{{ $bh->hours->end }}"></td>                
                </tr>
                @endif
                @endforeach
            </table>
        </div>
        <button class="btn btn-success mt-2" type="submit">ändern</button>
    </form>
</div>