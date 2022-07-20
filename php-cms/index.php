<?php
include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <title>Nidhi Patel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="./admin/styles/style.css" type="text/css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <div class="row p-0 m-0 h-100">
      <div class="col-3 bg-black text-center">
        <div>
          <img src="images/logo.jpeg" alt="profile photo" class="rounded-circle w-75" />
        </div>
        <h1 class="mt-4 text-white">Nidhi Patel</h1>
        <h5 class="mt-4 font text-white">Full-Stack Developer</h5>
        <div class="m-3 text-white d-flex gap-3 justify-content-center">
          <a href="https://www.linkedin.com/in/nidhipatel439/" target="_blank"><i class="bi bi-linkedin"></i></a>
          <a href="https://github.com/nidhipatel439" target="_blank"><i class="bi bi-github"></i></a>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item rounded-0 education-section-outer">
            <h2 class="accordion-header" id="headingOne">
              <p class="m-0 text-dark h3 py-2 ps-3" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Education
              </p>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body d-flex justify-content-center align-items-center">
                <div class="w-50 p-5 text-start education-section rounded">
                  <?php
                  $query = 'SELECT * FROM education ORDER BY start DESC';
                  $result = mysqli_query($connect, $query);
                  ?>
                  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                    <div class="row">
                      <div class="col-4">
                        <h5>
                          <?php echo $record['start']; ?> - <?php echo $record["end"]; ?>
                        </h5>
                      </div>
                      <div class="col-8">
                        <h5><?php echo $record['title']; ?></h5>
                        <h6><?php echo $record['degree']; ?></h6>
                        <h6><?php echo $record['location']; ?></h6>
                      </div>
                    </div>
                    <hr />
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item rounded-0 experience-section-outer">
            <h2 class="accordion-header" id="headingTwo">
              <p class="m-0 text-dark h3 py-2 ps-3" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                Experience
              </p>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body d-flex justify-content-center align-items-center">
                <div class="w-50 p-5 text-start experience-section rounded">
                  <?php
                  $query = 'SELECT * FROM experience ORDER BY start DESC';
                  $result = mysqli_query($connect, $query);
                  ?>
                  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                    <div class="row">
                      <div class="col-4">
                        <h5>
                          <?php echo $record['start']; ?> - <?php echo $record['end']; ?>
                        </h5>
                      </div>
                      <div class="col-8">
                        <h5><?php echo $record['title']; ?></h5>
                        <h6><?php echo $record['company_name']; ?></h6>
                        <?php if ($record['location']) : ?>
                          <h6><?php echo $record['location']; ?></h6>
                        <?php else : ?>
                          <span></span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <hr />
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item rounded-0 project-section-outer">
            <h2 class="accordion-header" id="headingThree">
              <p class="m-0 text-dark h3 py-2 ps-3" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                Projects
              </p>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body overflow-auto">
                <div class="row">
                  <?php $query = 'SELECT * FROM projects';
                  $result = mysqli_query($connect, $query); ?>
                  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-4">
                      <div class="card">
                        <?php if ($record['photo']) : ?>
                          <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>">
                        <?php else : ?>
                          <p>This record does not have an image!</p>
                        <?php endif; ?>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $record['title']; ?></h5>
                          <p class="card-text"><?php echo $record['content']; ?></p>
                          <p class="display-block mt-2 mb-0">
                            <?php if ($record['project_url'] != "") : ?>
                              <a href="<?php echo $record['project_url']; ?> " class="card-link">Project Link</a>
                            <?php else : ?>
                              <span></span>
                            <?php endif; ?>
                            <a href="<?php echo $record['github_url']; ?>" class="card-link">Github link</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item rounded-0 skill-section-outer">
            <h2 class="accordion-header" id="headingFour">
              <p class="m-0 text-dark h3 py-2 ps-3" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                Skills
              </p>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <?php
                $query = 'SELECT * FROM skills ORDER BY percent DESC';
                $result = mysqli_query($connect, $query);
                ?>
                <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                  <div class="progress my-4 position-relative">
                    <h5 class="m-0 bg-gradient text-center position-absolute top-50 start-0 translate-middle-y"><?php echo $record['skill_name']; ?></h5>
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $record['percent'] ?>%" aria-valuenow="<?php echo $record['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    <h6 class="m-0 px-2 position-absolute top-50 end-0 translate-middle-y"><?php echo $record['percent'] ?>%</h6>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</body>

</html>