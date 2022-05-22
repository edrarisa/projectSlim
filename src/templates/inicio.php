{% extends "layout.html" %}

{% block title %}Inicio{% endblock %}

{% block body %}
{{ parent() }}

<br>

<div class="row">
  <div class="col-sm-4">
    <div class="card border border-primary">
      <div class="card-header">

        <h2 class="text-center">Ingresar Usuarios</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <form method="post" class="row g-3 needs-validation" id="frm-guardar-usuario">
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre"
                name="nombre" id="validationCustom01" value="" required>

              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="email" class="form-control" id="email"
                name="email" id="validationCustom02" value="" required>

              </div>
              <div class="col-md-12">
                <label for="validationCustom04" class="form-label">Departamento</label>
                <select class="form-select" id="departamento" onchange="buscarCiudades(this)"
                name="departamento" id="validationCustom04" required>
                <option value="">Seleccionar...</option>
                <!-- <option value="sd">sds</option> -->

              </select>

            </div>

            <div class="col-md-12">
              <label for="validationCustom03" class="form-label">Ciudad</label>
              <select class="form-select" id="ciudad"
              name="ciudad" id="ciudad" required>
              <option value="">Seleccionar...</option>
              <!-- <option value="aaa">aaa</option> -->
            </select>


          </div>

          <div class="col-md-12">
            <label for="validationCustom05" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="asunto"
            name="asunto" id="validationCustom05" value="" required>

          </div>

          <div class="col-md-12">
            <label for="validationCustom06" class="form-label">Mensaje</label>
            <input type="text" class="form-control" id="mensaje"
            name="mensaje" id="validationCustom06" value="" required>

          </div>


          <div class="col-12">
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

  </div>
  <div class="col-sm-8">
    <div class="card border border-primary">
      <div class="card-header">
        Listado de Usuarios
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-striped table-sm table-bordered" id="table-users">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Ciudad</th>
                  <th>Dpto</th>
                  <th>Asunto</th>
                  <th>Mensaje</th>
                </tr>
              </thead>
              <tbody id="tbody-usuarios">

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


{% endblock %}
