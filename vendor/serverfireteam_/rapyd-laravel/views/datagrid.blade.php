@include('rapyd::toolbar', array('label'=>$label, 'buttons_right'=>$buttons['TR']))

<table{!! $dg->buildAttributes() !!}>

	<div class="pull-right">
			@if (!$no_add)
        	<a href="{!! url('panel/'.$current_entity.'/edit') !!}" class="btn btn-primary">Add</a>
        	@endif
	</div>

	@if ($dg->rowCount())
    		<thead>
			<tr>
				@foreach ($dg->columns as $column)
				        <th{!! $column->buildAttributes() !!}>
				        	@if ($column->orderby)
							@if ($dg->onOrderby($column->orderby_field, 'asc'))
						                <span class="glyphicon glyphicon-arrow-up"></span>
					                @else
						                <a href="{!! $dg->orderbyLink($column->orderby_field,'asc') !!}">
						                        <span class="glyphicon glyphicon-arrow-up"></span>
						                </a>
					                @endif
					                @if ($dg->onOrderby($column->orderby_field, 'desc'))
						                <span class="glyphicon glyphicon-arrow-down"></span>
					                @else
						                <a href="{!! $dg->orderbyLink($column->orderby_field,'desc') !!}">
						                        <span class="glyphicon glyphicon-arrow-down"></span>
						                </a>
					                @endif
						@endif
						        {!! $column->label !!}
					</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach ($dg->rows as $row)
			        <tr{!! $row->buildAttributes() !!}>
				        @foreach ($row->cells as $cell)

				        	@if($cell->name == 'parent' )
				        	<td{!! $cell->buildAttributes() !!}><a href="?parent={!! $row->cells[0]->value !!}">Childs</a></td>
				        	@else
					        <td{!! $cell->buildAttributes() !!}>{!! $cell->value !!}</td>
			                @endif

			                @endforeach
			        </tr>
			@endforeach
		</tbody>
	@else
		<h4>{{ Lang::get('rapyd::rapyd.empty_list') }}</h4>
	@endif
</table>

@if ($dg->havePagination())
	<div class="pagination">
		{!! $dg->links() !!}
	</div>
@endif
