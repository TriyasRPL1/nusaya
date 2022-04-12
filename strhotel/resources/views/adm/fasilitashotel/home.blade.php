<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}" />

  <title>STARSS | Home</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg static-top navbar-light shadow bg-light italiana">
    <div class="container">
      <a class="navbar-brand app-name" href="/">Starss</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav navbar-name">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kamar">Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#fasilitas">Fasilitas</a>
          </li>
        </ul>
      </div>

      @guest
      @if (Route::has('login'))
      <a class="btn btn-primary justify-content-end" href="{{ route('login') }}">{{ __('Login') }}</a>
      @endif
      @else
      <a class="btn btn-primary justify-content-end" href="{{ route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      @endguest

    </div>
  </nav>
  <!-- Akhir Navbar -->


  <!-- Awal Body -->
  @include('layouts.alert')
  <div class="container">
    <div class="row">
      <div class="col">

        <table class="table" style="margin-top: 200px">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          @forelse($fasilitashotel as $fasilitas)
          <tr>
            <td>{{ $fasilitas->nama}}</td>
            <td>{{$fasilitas->jumlah}}</td>
            <td>{{$fasilitas->deskripsi}}</td>
            <td>
              <a class="btn btn-primary edit" id="editFormModal" data-bs-toggle="modal" data-bs-target="#editModal" data-attr="{{ $fasilitas->id }}">Edit</a>
              <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete-fasilitas').submit();">Hapus</a>
              <form id="delete-fasilitas" action="#" method="POST" class="d-none">
                @csrf
                @method('delete')
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center">Tidak Ada Fasilitas Hotel!</td>
          </tr>
          @endforelse
        </table>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" style="font-size: 50px" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg></button>
        </div>
        <!-- Awal Modal -->
        <!-- Awal Modal Create-->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Fasilitas Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.fasilitas.upload')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="col-form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="jumlah" class="col-form-label">Jumlah :</label>
                    <input type="number" class="form-control" name="jumlah">
                  </div>
                  <div class="mb-3">
                    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Create-->
        <!-- Awal Modal Edit-->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Fasilitas Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.fasilitas.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="col-form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="jumlah" class="col-form-label">Jumlah :</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                  </div>
                  <div class="mb-3">
                    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Edit-->
        <!-- Akhir Modal -->

      </div>
    </div>
  </div>

  <script>
    // display a modal (medium modal)
    $(document).on('click', '#editFormModal', function() {
      var url = "127.0.0.1:8000/admin/fasilitashotel/";
      var tour_id = $("#editFormModal").data("data_attr")
      $.get(url + tour_id + '/edit', function(data) {
        //success data
        console.log(data);
        $('#nama').val(data.nama);
        $('#jumlah').val(data.jumlah);
        $('#deskripsi').val(data.deskripsi);
        $('#editModal').modal('show');
      })
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>