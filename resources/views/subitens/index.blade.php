@extends('layout.app')

@section('title', 'Módulos - Itens - Subitens')

@section('page-title', 'Módulos - Itens - Subitens')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selecione um subitem</h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="javascript:void(0)" id="novo-subitem" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO SUBITEM</a>
                            {{-- <a href="{{route('modulos.create')}}" class="nav-link active">NOVO ITEM</a> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-info">
                    <h6>Módulo: {{$item->modulo->nome}}</h6>
                    <h5>Item: {{$item->nome}}</h5>
                </div>
                
                @include('partials.datatables.buttons')
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Nome</th>
                            <th>Ativo</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($item->subitens as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->nome}}</td>
                                <td>{!!($row->active) ? '<span class="badge bg-primary">SIM</span>' : '<span class="badge bg-secondary">NÃO</span>' !!}</td>
                                <td class="td-1p">
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a href="{{route('modulos.itens.subitens.edit', [$item->modulo->id, $item->id, $row->id])}}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('modulos.itens.subitens.permissoes.index', [$item->modulo->id, $item->id, $row->id])}}" class="dropdown-item"><i class="fas fa-check-double"></i> Permissões</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$item->modulo->id}}, {{$item->id}}, {{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                        </tr>
                       @endforelse
                    </tbody>
                </table>
                <br>
                <div class="d-flex">
                    {{-- {!! $company-->links() !!} --}}
                </div>
                <div class="col-md-12">
                    <a href="{{url()->previous()}}" class="btn btn-outline-secondary"><i class="fas fa-undo"></i> Voltar</a>
                </div>
            </div>
        </div>
    </div>
    @include('subitens._partials.novo-subitem')
</div>
@endsection

@section('scripts')

<script>

    $('#novo-subitem').click(function(){
        $('.novo-subitem').modal()
    })
    // Removendo o registro
    function remover(modulo_id, item_id, val){
        confirmacao = confirm('Tem certeza que deseja remover este registro?');
        if(confirmacao){
            window.location.href = "{{url('/')}}/modulos/"+modulo_id+'/itens/'+item_id+'/subitens/'+val+'/destroy'
        }
    }
</script>

@endsection