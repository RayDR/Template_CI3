<!-- Section -->
<section class="vh-lg-100 mt-4 mt-lg-0 bg-soft d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center form-bg-image">
            <p class="text-center"><a href="<?= base_url('index.php/Home/login') ?>" class="text-gray-700"><i class="fas fa-angle-left me-2"></i> Volver al inicio de sesión</a></p>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="signin-inner my-3 my-lg-0 bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                    <h1 class="h3">Recuperación de contraseña</h1>
                    <p class="mb-4">Ingrese el correo registrado y su número de cuenta para poder acceder a la recuperación.</p>
                    <form action="#">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="email">Correo de Recuperación</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" placeholder="correo@correo.gob.mx" required autofocus>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="text">Número de Contrato</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="text" placeholder="Ej: 123450" required autofocus>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Recuperar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>