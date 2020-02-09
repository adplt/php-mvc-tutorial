<div class="container mt-5">
  <div class="row">
    <div class="col-6">
      <?php Flasher::getFlash(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <button type="button" class="btn btn-primary mb-5 show-add-modal" data-toggle="modal" data-target="#formStudent">
        Tambah Mahasiswa
      </button>
      <h3>Daftar Mahasiswa</h3>
      <ul class="list-group">
        <?php foreach($data['student'] as $student) : ?>
          <li class="list-group-item">
            <?= $student['name']; ?>
            <a href="<?= BASE_URL; ?>/Student/delete/<?= $student['id']?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Are your sure ?');">delete</a>
            <a href="<?= BASE_URL; ?>/Student/update/<?= $student['id']?>" class="badge badge-success float-right ml-2 show-update-modal" data-toggle="modal"
              data-target="#formStudent" data-id="<?= $student['id']; ?>">
              update
            </a>
            <a href="<?= BASE_URL; ?>/Student/detail/<?= $student['id']?>" class="badge badge-primary float-right ml-2">detail</a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formStudent" tabindex="-1" role="dialog" aria-labelledby="studentForm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentFormLabel">Tambah Mahasiswa Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL; ?>/Student/add" method="post">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Input your NIK">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input your name">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="For example: name@example.com">
          </div>
          <div class="form-group">
            <label for="degree">Degree</label>
            <select class="form-control" id="degree" name="degree">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Teknik Kelautan">Teknik Kelautan</option>
              <option value="Teknik Pangan">Teknik Pangan</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
