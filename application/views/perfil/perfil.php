<div class="row mt-1">
    <div class="col-12 col-xl-8">
        <div class="card card-body shadow-sm mb-4">
            <h2 class="h5 mb-4">Información General</h2>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cuenta">Número de Cuenta</label>
                        <input class="form-control" id="cuenta" name="cuenta" type="text" value="<?= $usuario->cve_cuenta ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div>
                            <label for="nombres">Nombre(s)</label>
                            <input class="form-control" id="nombres" name="nombres" type="text" value="<?= $usuario->nombres ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="primer_apellido">Primer Apellido</label>
                            <input class="form-control" id="primer_apellido" name="primer_apellido" value="<?= $usuario->primer_apellido ?>" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="segundo_apellido">Segundo Apellido</label>
                            <input class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?= $usuario->segundo_apellido ?>" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sexo">Sexo</label>
                        <select class="form-select mb-0" id="sexo" name="sexo" aria-label="Selección de sexo">
                            <option selected>Seleccione una opción</option>
                            <option value="M" <?php if($usuario->sexo == 'M') echo 'selected' ?>>Mujer</option>
                            <option value="H" <?php if($usuario->sexo == 'H') echo 'selected' ?>>Hombre</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 d-none">
                        <div class="form-group">
                            <label for="correo">Email</label>
                            <input class="form-control" id="correo" name="correo" value="" type="email" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 d-none">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input class="form-control" id="telefono" name="telefono" type="number" required>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button id="actualizar_perfil" type="submit" class="btn btn-dark">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-body shadow-sm mb-4">
                    <h2 class="h5 mb-4">Cambiar Contraseña</h2>
                    <div class="form-group">
                        <label for="password_actual">Contraseña Actual</label>
                        <input class="form-control" id="password_actual" type="password" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password_nueva">Nueva Contraseña</label>
                        <input class="form-control" id="password_nueva" type="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmar">Confirmar Nueva Contraseña</label>
                        <input class="form-control" id="password_confirmar" type="password" required>
                    </div>
                    <div class="mt-3">
                        <button id="cambiar_password" type="submit" class="btn btn-dark">Cambiar Contraseña</button>
                    </div>
                </div>
            </div>
        </div>
            <!-- <div class="col-12 mb-4">
                <div class="card shadow-sm text-center p-0">
                    <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"></div>
                    <div class="card-body pb-5">
                        <img src="../assets/img/team/profile-picture-1.jpg" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                        <h4 class="h3">Neil Sims</h4>
                        <h5 class="fw-normal">Senior Software Engineer</h5>
                        <p class="text-gray mb-4">New York, USA</p>
                        <a class="btn btn-sm btn-dark me-2" href="#"><span class="fas fa-user-plus me-1"></span> Connect</a>
                        <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                    </div>
                 </div>
            </div> -->
            <!-- <div class="col-12">
                <div class="card card-body shadow-sm mb-4">
                    <h2 class="h5 mb-4">Select profile photo</h2>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="user-avatar xl-avatar">
                                <img class="rounded" src="../assets/img/team/profile-picture-3.jpg" alt="change avatar">
                            </div>
                        </div>
                        <div class="file-field">
                            <div class="d-flex justify-content-xl-center ms-xl-3">
                               <div class="d-flex">
                                  <span class="icon icon-md"><span class="fas fa-paperclip me-3"></span></span> <input type="file">
                                  <div class="d-md-block text-left">
                                     <div class="fw-normal text-dark mb-1">Choose Image</div>
                                     <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                  </div>
                               </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<script src="<?= base_url('assets/js/perfil/perfil.js') ?>" type="text/javascript" charset="utf-8" async defer></script>