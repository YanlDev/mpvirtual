<x-user-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6 sm:mb-8">
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 sm:mb-8">
                Crear nuevo documento
            </h1>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <form action="{{ route('user.documents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-validation-errors class="mb-4" />
                    {{-- Tipo de documento --}}
                    <div class="mb-4 sm:mb-6">
                        <x-label class="mb-2">
                            Tipo de documento <span class="text-red-500">*</span>
                        </x-label>
                        <select name="document_type_id" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Seleccione su tipo de documento</option>
                            @foreach ($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}"
                                    {{ old('document_type_id') == $documentType->id ? 'selected' : '' }}>
                                    {{ $documentType->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('document_type_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Asunto --}}
                    <div class="mb-4 sm:mb-6">
                        <x-label class="mb-2">
                            Asunto <span class="text-red-500">*</span>
                        </x-label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Ingrese el asunto del documento" maxlength="255">
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-4 sm:mb-6">
                        <x-label class="mb-2">
                            Descripción
                        </x-label>
                        <textarea name="description" rows="4"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Proporcione detalles adicionales sobre su solicitud (opcional)" maxlength="1000">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs sm:text-sm text-gray-500">Máximo 1000 caracteres</p>
                    </div>

                    {{-- Adjuntar archivo --}}
                    <div class="mb-4 sm:mb-6">
                        <x-label class="mb-2">
                            Adjuntar archivo <span class="text-red-500">*</span>
                        </x-label>

                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-4 sm:p-6 hover:border-gray-400 transition-colors">
                            <div class="text-center">
                                <div
                                    class="mx-auto w-10 h-10 sm:w-12 sm:h-12 bg-gray-100 rounded-full flex items-center justify-center mb-3 sm:mb-4">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-lg sm:text-xl"></i>
                                </div>
                                <div class="mb-3 sm:mb-4">
                                    <label for="files" class="cursor-pointer">
                                        <span
                                            class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm sm:text-base">
                                            <i class="fas fa-plus mr-2"></i>
                                            Seleccionar Archivos
                                        </span>
                                        <input type="file" name="files[]" id="files" multiple
                                            accept=".pdf,.doc,.docx" class="hidden" required>
                                    </label>
                                </div>
                                <p class="text-xs sm:text-sm text-gray-600">
                                    Seleccione uno o más archivos (PDF, DOC, DOCX)
                                    <br>
                                    Tamaño máximo por archivo: 2MB
                                </p>
                            </div>
                        </div>
                        {{-- Lista de archivos seleccionados --}}
                        <div id="file-list" class="mt-4 space-y-2 hidden">
                            <h4 class="text-sm font-medium text-gray-700">Archivos seleccionados:</h4>
                            <div id="selected-files" class="space-y-2"></div>
                        </div>
                    </div>

                    {{-- Información importante --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-blue-500 mt-0.5 mr-2 sm:mr-3 flex-shrink-0"></i>
                            <div class="text-xs sm:text-sm text-blue-800">
                                <h4 class="font-medium mb-2">Información Importante:</h4>
                                <ul class="space-y-1 list-disc list-inside">
                                    <li>Una vez enviado, recibirá un código de seguimiento único</li>
                                    <li>Puede consultar el estado de su documento en cualquier momento</li>
                                    <li>Recibirá notificaciones sobre cambios en el estado</li>
                                    <li>Los archivos adjuntos son obligatorios</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Botones --}}
                    <div
                        class="flex flex-col sm:flex-row items-center justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                        <a href="{{ route('user.dashboard') }}"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors text-sm sm:text-base">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center text-sm sm:text-base">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Enviar Documento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript para mostrar archivos seleccionados --}}
    <script>
        const fileInput = document.getElementById('files');
        const fileList = document.getElementById('file-list');
        const selectedFilesContainer = document.getElementById('selected-files'); // ← Contenedor correcto
        let selectedFiles = [];

        fileInput.addEventListener('change', function(e) {
            selectedFiles = Array.from(e.target.files);
            showFiles();
        });

        function showFiles() {
            // Si no hay archivos, ocultar la lista
            if (selectedFiles.length === 0) {
                fileList.classList.add('hidden');
                return;
            }

            // Mostrar el contenedor
            fileList.classList.remove('hidden');

            // Limpiar solo el contenedor de archivos, NO todo
            selectedFilesContainer.innerHTML = '';

            // Crear cada archivo
            selectedFiles.forEach((file, index) => {
                // Contenedor principal del archivo
                const fileItem = document.createElement('div');
                fileItem.className =
                    'flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded';

                // Información del archivo
                const fileInfo = document.createElement('div');
                fileInfo.className = 'flex items-center flex-1';

                // Icono
                const icon = document.createElement('i');
                icon.className = 'fas fa-file-alt text-gray-500 mr-3';

                // Detalles del archivo
                const details = document.createElement('div');
                details.className = 'flex-1';

                const fileName = document.createElement('div');
                fileName.className = 'text-sm font-medium text-gray-700';
                fileName.textContent = file.name;

                const fileSize = document.createElement('div');
                fileSize.className = 'text-xs text-gray-500';
                fileSize.textContent = `${(file.size / 1024 / 1024).toFixed(2)} MB`;

                details.appendChild(fileName);
                details.appendChild(fileSize);

                fileInfo.appendChild(icon);
                fileInfo.appendChild(details);

                // Botón eliminar
                const removeButton = document.createElement('button');
                removeButton.type = 'button'; // ← IMPORTANTE: evita submit del form
                removeButton.className = 'text-red-500 hover:text-red-700 p-1 rounded transition-colors';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                removeButton.onclick = () => removeFile(index);

                // Ensamblar todo
                fileItem.appendChild(fileInfo);
                fileItem.appendChild(removeButton);
                selectedFilesContainer.appendChild(fileItem);
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);
            updateFileInput(); // ← Actualizar el input real
            showFiles();
        }

        function updateFileInput() {
            const dt = new DataTransfer();
            selectedFiles.forEach(file => {
                dt.items.add(file);
            });
            fileInput.files = dt.files;
        }

        // Contador de caracteres para descripción
        const textarea = document.querySelector('textarea[name="description"]');
        const maxLength = 1000;

        const counter = document.createElement('p');
        counter.className = 'mt-1 text-xs text-gray-500 text-right';
        counter.textContent = `0/${maxLength} caracteres`;
        textarea.parentNode.appendChild(counter);

        textarea.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${maxLength} caracteres`;

            if (length > maxLength * 0.9) {
                counter.className = 'mt-1 text-xs text-orange-500 text-right';
            } else if (length === maxLength) {
                counter.className = 'mt-1 text-xs text-red-500 text-right';
            } else {
                counter.className = 'mt-1 text-xs text-gray-500 text-right';
            }
        });
    </script>
</x-user-layout>
