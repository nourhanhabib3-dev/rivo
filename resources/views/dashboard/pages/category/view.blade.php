@extends('dashboard.layout.main')

@section('body')


    <main class="rivo-content">

         <div class="rivo-page-header d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h1>Categories</h1>
            <div class="rivo-breadcrumb"><a href="index.html">Dashboard</a> / Category</div>
          </div>

          <a href="{{route('cat.create')}}" class="btn btn-rivo-primary"><i class="bi bi-person-plus me-2">
             </i>Add category
          </a>
        </div>


        <!-- Admins Table -->
        <div class="rivo-card">
          <div class="rivo-card__header">
            <h3 class="rivo-card__title">All Categoreis</h3>
          </div>
          <div class="table-responsive">
            <table class="table rivo-table mb-0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $catData as $value )
                <tr>
                  <td>{{$value->name}}</td>

                  <td class="d-flex">
                    <a href="{{route('cat.edit' , $value->id)}}" class="rivo-action-btn"><i class="bi bi-pencil"></i></button>
                    <form action="{{route('cat.destroy' , $value->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="rivo-action-btn"><i class="bi bi-shield"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </main>















@endsection
