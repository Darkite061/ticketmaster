@extends('/admin/plantilla/layout')

@section('titulo','CREAR USUARIO')

@section('contenido')
    <main class="container mt-4">
        <section>
            <h2>Administración de Eventos</h2>
            <p>En esta sección, gestionamos los eventos a través de Ticketmaster:</p>
            <ul>
                <li><strong>Compra de Boletos:</strong> Ofrecemos boletos para conciertos, deportes, arte, teatro y más.</li>
                <li><strong>Soporte al Cliente:</strong> ¿Necesitas ayuda? Contáctanos para resolver cualquier problema relacionado con tus boletos.</li>
                <li><strong>Administra tu Cuenta:</strong> Si tienes una cuenta en Ticketmaster, puedes acceder a tus boletos y detalles de eventos.</li>
            </ul>
        </section>
    </main>
    <!-- Enlace a Bootstrap JS (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
