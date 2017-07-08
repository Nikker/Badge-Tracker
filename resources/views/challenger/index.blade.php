@extends('layouts.app')

@section('page-title', 'Challenger Directory')

@section('content')
	<div class="container" id="challengers">
		<div class="row">
			<div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
				<div class="row">
					<div class="col-sm-6">
						<h1>Challenger Directory</h1>
						<div>Displaying badge totals for {{ App\Models\Season::currentSeason() }}</div>
					</div>
					<div class="col-sm-6">
						<form class="filter" data-container=".challenger-list" data-items=".challenger">
							<div class="input-group">
								<input type="text" data-search=".name" class="form-control" placeholder="Filter Challengers">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="fa fa-search" aria-hidden="true" aria-title="Search"></i>
									</button>
								</span>
							</div>
						</form>
					</div>
				</div>

				<ol class="challenger-list">
					@foreach ($challengers as $challenger)
						<li class="challenger">
							<a href="{{ route('challenger.show', $challenger) }}">
								<h2 class="name">{{ $challenger->name }}</h2>
								<div class="stats">
									<span class="badges">
										<i class="fa fa-shield" aria-hidden="true" title="5 of 18 Badges Won"></i>
										{{ $challenger->current_season_badges }} / {{ $season_badges }}
									</span>
									<span class="since">
										<i class="fa fa-calendar" aria-hidden="true" title="Challenger Since Season 1"></i>
										{{ $challenger->joined_season }}
									</span>
								</div>
							</a>
						</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
@endsection