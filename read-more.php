<?php
  include '../admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Treatments</title>
    <!-- treatment.css -->
    <link rel="stylesheet" href="./sytles/" />
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- bootstrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <?php 
      include 'header.php';
      ?>
      <br>
      <br>
      <br>
      <br>
    <main class="mt-5">
    
      <section class="container w-100">
      <?php
          $treatment_id = $_GET['treatment_id'];
          $query = "Select * from treatments where treatment_id='$treatment_id'";
          $result = mysqli_query($connection, $query);
        while ($treatment = mysqli_fetch_assoc($result)): 
        ?>
        
          <h2 class="bg-dark mb-5 text-center p-3 text-light"><?php echo htmlspecialchars($treatment['name']); ?></h2>


        <div class="row">
        
          <div class="col-lg-6 mb-5">
            <img
            src="../photo/<?php echo htmlspecialchars($treatment['photo']); ?>" alt='<?php echo $treatment['photo'] ?>'
              width="100%"
              height="100%"
              class="rounded-1"
            />
          </div>
          <?php endwhile; ?>
          <div class="col-lg-6">
            <h4>
              Purpose <span class="p-1 d-inline-block w-100 bg-warning"></span>
            </h4>
            <p>
              Botox injections can be used for cosmetic or medical reasons. For
              example, they can smooth wrinkles, treat neck spasms, and prevent
              migraines.
            </p>
            <h4>
              How it works
              <span class="p-1 d-inline-block w-100 bg-warning"></span>
            </h4>
            <p>
              Botox injections prevent the release of acetylcholine at the nerve
              terminal, which blocks neurotransmission.
            </p>
            <h4>
              Procedure
              <span class="p-1 d-inline-block w-100 bg-warning"></span>
            </h4>
            <p>
              A medical professional injects a small amount of Botox into the
              skin or muscle with a thin needle.
            </p>
            <h4>
              Side effects
              <span class="p-1 d-inline-block w-100 bg-warning"></span>
            </h4>
            <p>
              Common side effects include pain, swelling, bruising, headache,
              flu-like symptoms, and upset stomach. Injections in the face may
              also cause temporary drooping eyelids.
            </p>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
     <?php
      include 'footer.php';
      ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
