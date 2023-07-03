@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Client' }}</h4>
        </span>

        <div class="pull-right">
            @if(auth()->user()->hasRole('Super-Admin'))
            <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clients.client.index') }}" class="btn btn-primary" title="{{ trans('clients.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="{{ trans('clients.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary" title="{{ trans('clients.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('clients.delete') }}" onclick="return confirm(&quot;{{ trans('clients.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
@endif
        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('clients.first_name') }}</dt>
            <dd>{{ $client->first_name }}</dd>
            <dt>{{ trans('clients.last_name') }}</dt>
            <dd>{{ $client->last_name }}</dd>
            <dt>{{ trans('clients.phone') }}</dt>
            <dd>{{ $client->phone }}</dd>
            <dt>{{ trans('clients.email') }}</dt>
            <dd>{{ $client->email }}</dd>
            <dt>{{ trans('clients.ud') }}</dt>
            <dd>{{ $client->ud }}</dd>
            <dt>{{ trans('clients.photo_ud_frent') }}</dt>
            <dd> <img style="    width: 300px;" src="{{ asset($client->photo_ud_frent) }}" alt=""> </dd>
            <dt>{{ trans('clients.photo_ud_back') }}</dt>
            <dd><img style="    width: 300px;" src="{{ asset($client->photo_ud_back) }}" alt=""></dd>
            <dt>{{ trans('login.signature') }}</dt>
            <dd><img  src="{{ asset('images/'.$client->singateur) }}" alt=""></dd>

            <dt>{{ trans('clients.contry_id') }}</dt>
            <dd>{{ optional($client->contry)->name }}</dd>

            <dd>
                    @if ($client->accepted == null && $client->refused == null)
                {{-- <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8"> --}}
                    {{-- <input name="_method" value="DELETE" type="hidden"> --}}
                    {{-- {{ csrf_field() }} --}}
                <a href="{{ route('clients.client.accept', $client->id) }}" class="btn btn-primary">{{ trans('clients.accepted') }}</a>

               <button id="myBtn" class="btn btn-danger" >{{ trans('clients.refused') }}</button>




            </div>

                </form>
            @elseif ($client->accepted == 1)
            <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
            @elseif ($client->refused == 1)
            <p class="btn btn-danger">  {{ trans('clients.refused') }}</p>
            @endif  </dd>




        </dl>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8">
       <input name="_method" value="PUT" type="hidden">
       {{ csrf_field() }}

       <dl class="dl-horizontal">
        <dt>{{ trans('acceptation_clients.commenter') }}</dt>
        <dd> <textarea style="height: 158px;
            width: 600px;
        " type="text" name="commenter" required> </textarea></dd>
       </dl>


      <br>
      <br>



      <button type="submit" class="btn btn-danger" title="{{ trans('clients.delete') }}" >
        {{ trans('clients.refused') }}
    </button>
      </form>
    </div>

  </div>























    </div>
</div>
























@endsection


@section('js')

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
@endsection
