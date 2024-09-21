@extends('layout')

@section('content')
<!-- Sección Actividades -->
<div class="content py-5" style="background-color: #f5f7f6;">
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5" style="color: #225b60; font-size: 2.5rem;">Actividades en Chajil Siwan</h2>
        <div class="row">
            <!-- Avistamiento de Aves -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalAve">
                    <img src="{{ asset('imagenes/ave.jpg') }}" class="card-img-top" alt="Avistamiento de Aves" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Avistamiento de Aves</h5>
                        <p class="card-text">Disfruta de la variedad de especies que habitan el parque y admira su belleza en su entorno natural.</p>
                    </div>
                </div>
                <!-- Modal para Avistamiento de Aves -->
                <div class="modal fade" id="modalAve" tabindex="-1" role="dialog" aria-labelledby="modalAveLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAveLabel">Avistamiento de Aves</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/ave.jpg') }}" class="img-fluid" alt="Avistamiento de Aves">
                                <p class="mt-3">Disfruta de la variedad de especies que habitan el parque y admira su belleza en su entorno natural. Trae binoculares si tienes, y mantén la calma para poder observar la mayor cantidad de aves.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Senderismo -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalSenderismo">
                    <img src="{{ asset('imagenes/senderismo.jpg') }}" class="card-img-top" alt="Senderismo" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Senderismo</h5>
                        <p class="card-text">Explora nuestros senderos rodeados de vegetación y disfruta de un recorrido lleno de tranquilidad y belleza natural.</p>
                    </div>
                </div>
                <!-- Modal para Senderismo -->
                <div class="modal fade" id="modalSenderismo" tabindex="-1" role="dialog" aria-labelledby="modalSenderismoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSenderismoLabel">Senderismo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/senderismo.jpg') }}" class="img-fluid" alt="Senderismo">
                                <p class="mt-3">Lleva calzado adecuado para terrenos irregulares y siempre sigue los senderos marcados para tu seguridad y la preservación del ambiente natural.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Camping -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalCamping">
                    <img src="{{ asset('imagenes/camping.jpg') }}" class="card-img-top" alt="Camping" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Camping</h5>
                        <p class="card-text">Acampa bajo las estrellas y vive una experiencia inolvidable en plena naturaleza.</p>
                    </div>
                </div>
                <!-- Modal para Camping -->
                <div class="modal fade" id="modalCamping" tabindex="-1" role="dialog" aria-labelledby="modalCampingLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCampingLabel">Camping</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/camping.jpg') }}" class="img-fluid" alt="Camping">
                                <p class="mt-3">Acampa bajo las estrellas y vive una experiencia inolvidable en plena naturaleza. Recuerda llevar todo tu equipo necesario para una noche cómoda al aire libre.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Ciclismo de Montaña -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalCiclismo">
                    <img src="{{ asset('imagenes/ciclismo.jpg') }}" class="card-img-top" alt="Ciclismo de Montaña" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Ciclismo de Montaña</h5>
                        <p class="card-text">Disfruta de la adrenalina mientras recorres nuestros caminos en bicicleta rodeado de naturaleza.</p>
                    </div>
                </div>
                <!-- Modal para Ciclismo de Montaña -->
                <div class="modal fade" id="modalCiclismo" tabindex="-1" role="dialog" aria-labelledby="modalCiclismoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCiclismoLabel">Ciclismo de Montaña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/ciclismo.jpg') }}" class="img-fluid" alt="Ciclismo de Montaña">
                                <p class="mt-3">Recorre nuestros caminos y disfruta de la adrenalina del ciclismo de montaña. No olvides el equipo de protección para garantizar una experiencia segura.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Puentes Colgantes -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalPuentes">
                    <img src="{{ asset('imagenes/puente_colgante.jpg') }}" class="card-img-top" alt="Puentes Colgantes" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Puentes Colgantes</h5>
                        <p class="card-text">Atrévete a cruzar nuestros emocionantes puentes colgantes y disfruta de vistas impresionantes desde las alturas.</p>
                    </div>
                </div>
                <!-- Modal para Puentes Colgantes -->
                <div class="modal fade" id="modalPuentes" tabindex="-1" role="dialog" aria-labelledby="modalPuentesLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPuentesLabel">Puentes Colgantes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/puente_colgante.jpg') }}" class="img-fluid" alt="Puentes Colgantes">
                                <p class="mt-3">Disfruta de vistas espectaculares mientras cruzas nuestros puentes colgantes. Mantén siempre tu equilibrio y sigue las instrucciones de seguridad.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Canopy -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-lg" data-toggle="modal" data-target="#modalCanopy">
                    <img src="{{ asset('imagenes/canopy.jpg') }}" class="card-img-top" alt="Canopy" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #225b60;">Canopy</h5>
                        <p class="card-text">Vive la emoción de volar entre los árboles a través de nuestra atracción de canopy.</p>
                    </div>
                </div>
                <!-- Modal para Canopy -->
                <div class="modal fade" id="modalCanopy" tabindex="-1" role="dialog" aria-labelledby="modalCanopyLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCanopyLabel">Canopy</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('imagenes/canopy.jpg') }}" class="img-fluid" alt="Canopy">
                                <p class="mt-3">Vuela entre los árboles y disfruta de una experiencia llena de adrenalina con nuestra actividad de canopy. Asegúrate de seguir todas las indicaciones de seguridad para disfrutar al máximo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.2)';
        });
    });
</script>
@endsection
