@if(isset($ranking['title']) && $ranking['title'])<h2>{{$ranking['title']}}</h2>@endif
@if(count($ranking['results']) === 0)
    <p>No tests found.</p>
@else
    <table class="table table-striped table-hover table-condensed">
        <tr>
            <th>Developer</th>
            <th>Tests</th>
        </tr>
        @foreach($ranking['results'] as $row)
            <tr>
                <td>
                    <a href="{{ route('user-tests', ['user' => $row->author_slug]) }}@if(isset($months_back) && isset($type) && $type == 'from')?fromMonthsBack={{$months_back}}@elseif(isset($months_back))?monthsBack={{$months_back}}@endif">
                        {{$row->author}}
                    </a>
                </td>
                <td>{{$row->score}}</td>
            </tr>
        @endforeach
    </table>
@endif