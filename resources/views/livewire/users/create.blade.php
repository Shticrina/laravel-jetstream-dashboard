<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
	<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
		<div class="fixed inset-0 transition-opacity" aria-hidden="true">
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>

		<!-- This element is to trick the browser into centering the modal contents. -->
		<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

		<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<form class="">
				<div class="bg-white p-6 sm:py-8 sm:px-16">
					<div class="text-center sm:mt-4 sm:ml-4 sm:text-left">
						<h3 class="text-4xl leading-6 text-red-800 mb-8" id="modal-headline">
							@if($user_id)
								Edit user
							@else
								Create new user
							@endif
						</h3>
						
						<div class="mb-4">
							<label for="userName" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
							<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userName" placeholder="Enter Name" wire:model="username">
							@error('username') <span class="text-red-500">{{ $message }}</span>@enderror
						</div>

						<div class="mb-4">
							<label for="userEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
							<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userEmail" placeholder="Enter Email" wire:model="email">
							@error('email') <span class="text-red-500">{{ $message }}</span>@enderror
						</div>

						<div class="mb-4">
							<label for="userPassword" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
							<input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userPassword" placeholder="Enter Password" wire:model="password">
							@error('password') <span class="text-red-500">{{ $message }}</span>@enderror
						</div>
					</div>
				</div>

				<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
					<button type="button" wire:click.prevent="store()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:ml-3 sm:w-auto sm:text-sm">
					Save
					</button>

					<button type="button" wire:click="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-red-700 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
					Cancel
					</button>
				</div>
			</form>
		</div>
	</div>
</div>