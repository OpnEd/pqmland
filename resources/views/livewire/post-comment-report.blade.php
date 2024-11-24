<div class="fixed inset-0 z-10 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 class="text-lg font-semibold mb-4">Reportar comentario</h2>

        <form wire:submit.prevent="submitReport">
            <!-- Selección de motivo -->
            <label for="reason" class="block text-sm font-medium text-gray-700">Motivo</label>
            <select id="reason" wire:model="reportReason" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Seleccione un motivo</option>
                <option value="spam">Spam</option>
                <option value="ofensivo">Lenguaje ofensivo</option>
                <option value="contenido_inapropiado">Contenido inapropiado</option>
            </select>
            @error('reportReason') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- Detalles adicionales -->
            <label for="details" class="block text-sm font-medium text-gray-700 mt-4">Detalles adicionales</label>
            <textarea id="details" wire:model="reportDetails" rows="4"
                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
            @error('reportDetails') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- Botón de envío -->
            <div class="mt-4 flex justify-end">
                <button type="button" wire:click="closeReport"
                        class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded-md mr-2">
                    Cancelar
                </button>
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                    Enviar reporte
                </button>
            </div>
        </form>
    </div>
</div>
