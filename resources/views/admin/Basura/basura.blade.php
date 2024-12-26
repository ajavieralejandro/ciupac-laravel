<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Basura</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-4xl mx-auto py-8">
        @if($errors->any())
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-2xl font-bold text-center mb-6">Crear Basura</h1>
        <form id="wizard-form" action="{{ route('add_medicion_basura') }}" method="POST"
            class="bg-white p-6 rounded shadow-md">
            @csrf
            <!-- Página 1 -->
            <div class="wizard-page active" id="page-1">
                <div class="mb-4">
                    <label for="fecha_hora" class="block text-gray-700 font-bold mb-2">Fecha y Hora:</label>
                    <input type="datetime-local" id="fecha_hora" name="fecha_hora"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('fecha_hora') }}">
                    @error('fecha_hora')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="largo_perfil" class="block text-gray-700 font-bold mb-2">Largo del Perfil:</label>
                    <input type="text" id="largo_perfil" name="largo_perfil"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('largo_perfil') }}">
                    @error('largo_perfil')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="responsable_medicion" class="block text-gray-700 font-bold mb-2">Responsable de
                        Medición:</label>
                    <input type="text" id="responsable_medicion" name="responsable_medicion"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('responsable_medicion') }}">
                    @error('responsable_medicion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>



                <div class="mb-4">
                    <label for="localidad_id" class="block text-gray-700 font-bold mb-2">Localidad:</label>
                    <select id="localidad_id" name="localidad_id" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">Seleccione una localidad</option>
                        <?php foreach ($localidades as $localidad): ?>
                        <option value="<?php echo htmlspecialchars($localidad['id']); ?>"
                            <?php echo old('localidad_id') == $localidad['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($localidad['name']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    @error('localidad_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sitio_perfil" class="block text-gray-700 font-bold mb-2">Sitio Perfil:</label>
                    <input type="text" id="sitio_perfil" name="sitio_perfil"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('sitio_perfil') }}">
                    @error('sitio_perfil')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Página 2 -->
            <div class="wizard-page hidden" id="page-2">
                <div class="mb-4">
                    <label for="coincide_perfil" class="block text-gray-700 font-bold mb-2">¿Coincide el
                        Perfil?:</label>
                    <input type="checkbox" id="coincide_perfil" name="coincide_perfil" class="h-5 w-5"
                        {{ old('coincide_perfil') ? 'checked' : '' }}>
                    @error('coincide_perfil')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="hora_bajamar" class="block text-gray-700 font-bold mb-2">Hora Bajamar:</label>
                    <input type="time" id="hora_bajamar" name="hora_bajamar"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('hora_bajamar') }}">
                    @error('hora_bajamar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="distancia_pleamar_mojon" class="block text-gray-700 font-bold mb-2">Distancia Pleamar al
                        Mojón:</label>
                    <input type="text" id="distancia_pleamar_mojon" name="distancia_pleamar_mojon"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('distancia_pleamar_mojon') }}">
                    @error('distancia_pleamar_mojon')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="distancia_agua_pleamar" class="block text-gray-700 font-bold mb-2">Distancia Agua
                        Pleamar:</label>
                    <input type="text" id="distancia_agua_pleamar" name="distancia_agua_pleamar"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('distancia_agua_pleamar') }}">
                    @error('distancia_agua_pleamar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="personas_sector1" class="block text-gray-700 font-bold mb-2">Personas en Sector
                        1:</label>
                    <input type="number" id="personas_sector1" name="personas_sector1"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('personas_sector1') }}">
                    @error('personas_sector1')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="personas_sector2" class="block text-gray-700 font-bold mb-2">Personas en Sector
                        2:</label>
                    <input type="number" id="personas_sector2" name="personas_sector2"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('personas_sector2') }}">
                    @error('personas_sector2')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="wizard-page hidden" id="page-3">
                <div class="mb-4">
                    <label for="cestos_area_medicion_1" class="block text-gray-700 font-bold mb-2">Cestos en Área de
                        Medición 1:</label>
                    <input type="number" id="cestos_area_medicion_1" name="cestos_area_medicion_1"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('cestos_area_medicion_1') }}">
                    @error('cestos_area_medicion_1')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="cestos_area_medicion_2" class="block text-gray-700 font-bold mb-2">Cestos en Área de
                        Medición 2:</label>
                    <input type="number" id="cestos_area_medicion_2" name="cestos_area_medicion_2"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('cestos_area_medicion_2') }}">
                    @error('cestos_area_medicion_2')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="cestos_derecha_izquierda" class="block text-gray-700 font-bold mb-2">Cestos entre
                        Derecha e Izquierda:</label>
                    <input type="number" id="cestos_derecha_izquierda" name="cestos_derecha_izquierda"
                        class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('cestos_derecha_izquierda') }}">
                    @error('cestos_derecha_izquierda')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="wizard-page hidden" id="page-4">
                <h3 class="text-lg font-bold text-gray-700 mt-6">Residuos</h3>

                <div class="grid grid-cols-2 gap-4">

                    <div class="mb-4">
                        <label for="residuos_papel" class="block text-gray-700 font-bold mb-2">Papel:</label>
                        <input type="number" id="residuos_papel" name="residuos_papel"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_papel') }}">
                        @error('residuos_papel')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="residuos_cigarrillos"
                            class="block text-gray-700 font-bold mb-2">Cigarrillos:</label>
                        <input type="number" id="residuos_cigarrillos" name="residuos_cigarrillos"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_cigarrillos') }}" required>
                        @error('residuos_cigarrillos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="desechos_sanitarios" class="block text-gray-700 font-bold mb-2">Desechos
                            Sanitarios:</label>
                        <input type="number" id="desechos_sanitarios" name="desechos_sanitarios"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('desechos_sanitarios') }}" required>
                        @error('desechos_sanitarios')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_ropa" class="block text-gray-700 font-bold mb-2">Ropa:</label>
                        <input type="number" id="residuos_ropa" name="residuos_ropa"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_ropa') }}" required>
                        @error('residuos_ropa')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_madera" class="block text-gray-700 font-bold mb-2">Madera:</label>
                        <input type="number" id="residuos_madera" name="residuos_madera"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_madera') }}" required>
                        @error('residuos_madera')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_metal" class="block text-gray-700 font-bold mb-2">Metal:</label>
                        <input type="number" id="residuos_metal" name="residuos_metal"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_metal') }}" required>
                        @error('residuos_metal')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="mb-4">
                        <label for="residuos_goma" class="block text-gray-700 font-bold mb-2">Goma:</label>
                        <input type="number" id="residuos_goma" name="residuos_goma"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_goma') }}">
                        @error('residuos_goma')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_vidrio" class="block text-gray-700 font-bold mb-2">Vidrio:</label>
                        <input type="number" id="residuos_vidrio" name="residuos_vidrio"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_vidrio') }}">
                        @error('residuos_vidrio')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_ceramica" class="block text-gray-700 font-bold mb-2">Cerámica:</label>
                        <input type="number" id="residuos_ceramica" name="residuos_ceramica"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_ceramica') }}" required>
                        @error('residuos_ceramica')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="residuos_otros" class="block text-gray-700 font-bold mb-2">Otros:</label>
                        <input type="number" id="residuos_otros" name="residuos_otros"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ old('residuos_otros') }}" required>
                        @error('residuos_otros')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
            </div>

            <!-- Botones de navegación -->
            <div class="flex justify-between mt-6">
                <button type="button" id="prev-btn"
                    class="hidden bg-gray-500 text-white px-4 py-2 rounded">Anterior</button>
                <button type="button" id="next-btn" class="bg-blue-500 text-white px-4 py-2 rounded">Siguiente</button>
                <button type="submit" id="submit-btn"
                    class="hidden bg-green-500 text-white px-4 py-2 rounded">Enviar</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            let currentPage = 1;
            const totalPages = $(".wizard-page").length;

            function updateWizard() {
                $(".wizard-page").addClass("hidden");
                $(`#page-${currentPage}`).removeClass("hidden");

                if (currentPage === 1) {
                    $("#prev-btn").addClass("hidden");
                } else {
                    $("#prev-btn").removeClass("hidden");
                }

                if (currentPage === totalPages) {
                    $("#next-btn").addClass("hidden");
                    $("#submit-btn").removeClass("hidden");
                } else {
                    $("#next-btn").removeClass("hidden");
                    $("#submit-btn").addClass("hidden");
                }
            }

            $("#next-btn").click(function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateWizard();
                }
            });

            $("#prev-btn").click(function () {
                if (currentPage > 1) {
                    currentPage--;
                    updateWizard();
                }
            });

            updateWizard();
        });

    </script>
</body>

</html>
