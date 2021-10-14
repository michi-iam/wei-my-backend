<div class="container mt-2 p-3 bg-dark bg-gradient shadow text-light rounded">
    @foreach($businesshours as $bh)
    @if($loop->first)
    <div class="row text-center">
        <h2>{{ $bh->post->title }}</h2>
        <h4>{{ $bh->post->subtitle }}</h4>
    </div>
    <div class="row mt-4">
        <p>{{ $bh->post->text }}</p>
    </div>
    @endif
    @endforeach
    
    <div class="row text-dark">
        <table class="bg-primary p-3 rounded shadow">
            @foreach($businesshours as $bh)
            @if($bh->hours->start != null)
                @if($loop->iteration % 2 != 0 || $loop->iteration == 1)
                    <tr>
                        <td class="bg-secondary p-3">{{ $bh->hours->weekday }}</td>
                        <td class="bg-warning p-3 text-center">{{ $bh->hours->start }} bis {{ $bh->hours->end }}</td>
                    @else 
                    @if($bh->hours->start != null)
                        <td class="bg-warning p-3 text-center">{{ $bh->hours->start }} bis {{ $bh->hours->end }}</td>
                    @endif
                    </tr>
                @endif
    
                @else
                    @if($loop->iteration % 2 != 0 || $loop->iteration == 1)
                    <tr>
                        <td class="bg-secondary p-3">{{ $bh->hours->weekday }}</td>
                        <td class="text-center bg-warning p-3">geschlossen</td>
                   
                    
                    </tr>
                    @endif
    
            @endif
            @endforeach
        </table>
    </div>
    
</div>