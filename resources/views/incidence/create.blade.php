<!-- Modal Incidence-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <!--Modal Title-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reportar Incidencia</h4>
            </div>
            <!--Modal Body-->
            <div class="modal-body">
                <div id="incidence-form">
                    <form id="create-incidence">
                        <div class="form-group" id="select">
                            <label for="date"> <i class="fa fa-calendar" aria="true"></i> Seleccione Fecha:</label>
                            <select name="date" id="date" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="incidence_type">Motivo de Incidencia: </label>
                            <input type="text" class="form-control" id="incidence_type" name="incidence_type" placeholder="50 caracteres máx.">
                        </div>
                        <div class="form-group">
                                <label for="description">Descripción: </label>
                                <textarea name="description" id="description" rows="5" class="form-control" placeholder="50 caracteres máx."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="activity">Actividades: </label>
                            <textarea name="activity" id="activity" rows=5 class="form-control" placeholder="255 caracteres máx."></textarea>
                        </div>
                    </form>
                </div>
            </div><!--/Modal Body-->
            <!--Modal Footer-->
            <div class="modal-footer">
                <button id="save-incidence" type="submit" data-dismiss="modal" class="btn btn-cyan">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!--/Modal Footer-->
        </div><!--/Modal content-->
    </div><!--/Modal Dialog-->
</div><!--Modal fade-->


