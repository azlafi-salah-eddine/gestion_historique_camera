@extends('layouts.app')

@section('title', 'Modifier une demande')

@section('main')
    <section class="container mt-5">
        <h1 class="h2 mb-4">Modifier Demande</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Erreur !</strong> Il y a un problème avec vos informations d'identification.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('demandes.update', $demande->Id_de) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom_demandeur" class="form-label">Employé :</label>
                <select id="nom_demandeur" name="Id_emp" class="form-select">
                    @foreach ($employes as $employe)
                        <option value="{{ $employe->Id_emp }}" {{ $demande->Id_emp == $employe->Id_emp ? 'selected' : '' }}>
                            {{ $employe->Nom_emp }} {{ $employe->Prenom_emp }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="objet" class="form-label">Objet:</label>
                <input type="text" id="objet" name="Objet" value="{{ $demande->Objet }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="reference" class="form-label">Référence:</label>
                <input type="text" id="reference" name="Reff" value="{{ $demande->Reff }}" class="form-control">
            </div>

            <div id="camera_container">
                @foreach ($concernes as $concerne)
                    <div class="mb-3 camera-section">
                        <div class="d-flex align-items-center mb-2">
                            <select name="Id_c[]" class="form-select me-3" required>
                                @foreach ($cameras as $camera)
                                    <option value="{{ $camera->Id_c }}" {{ $concerne->Id_c == $camera->Id_c ? 'selected' : '' }}>
                                        {{ $camera->Nom_c }} | {{ $camera->Site }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="form-label me-2">Début :</label>
                            <input type="datetime-local" name="debut_enregistrement[]" value="{{ $concerne->Debut_sauv }}" class="form-control me-3" required>
                            <label class="form-label me-2">Fin :</label>
                            <input type="datetime-local" name="fin_enregistrement[]" value="{{ $concerne->Fin_sauv }}" class="form-control me-3" required>
                            <button type="button" class="remove-camera btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <button type="button" id="add_camera" class="btn btn-success">+ Ajouter une caméra</button>
            </div>

            <div class="mb-3">
                <label class="form-label">Sauvegarde:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="sauvegarde_oui" name="Sauvegarder" value="1" class="form-check-input" required {{ $demande->Sauvegarder ? 'checked' : '' }}>
                    <label for="sauvegarde_oui" class="form-check-label">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="sauvegarde_non" name="Sauvegarder" value="0" class="form-check-input" required {{ !$demande->Sauvegarder ? 'checked' : '' }}>
                    <label for="sauvegarde_non" class="form-check-label">Non</label>
                </div>
            </div>

            <div class="mb-3" id="but_section" style="display: {{ $demande->Sauvegarder ? 'block' : 'none' }};">
                <label for="but" class="form-label">But:</label>
                <textarea id="but" name="But" class="form-control">{{ $demande->But }}</textarea>
            </div>

            <div class="mb-3">
                <label for="date_operation" class="form-label">Date d'opération:</label>
                <input type="datetime-local" id="date_operation" name="Date_operation" value="{{ $demande->Date_operation }}" class="form-control">
            </div>
            @if (auth()->check())
                <input type="hidden" name="id_u" value="{{ auth()->user()->Id_u }}">
            @else
                <input type="hidden" name="id_u" value="">
                <p>Erreur: Utilisateur non authentifié.</p>
            @endif

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </section>

    <script>
        function addCamera() {
            var cameraContainer = document.getElementById('camera_container');
            var cameras = {!! json_encode($cameras) !!}; // Récupération des caméras depuis le contrôleur Laravel

            var cameraDiv = document.createElement('div');
            cameraDiv.classList.add('mb-3', 'camera-section');

            var row1Div = document.createElement('div');
            row1Div.classList.add('d-flex', 'align-items-center', 'mb-2');

            var cameraSelect = document.createElement('select');
            cameraSelect.id = 'nom_camera';
            cameraSelect.name = 'Id_c[]';
            cameraSelect.classList.add('form-select', 'me-3');
            cameraSelect.required = true;

            cameras.forEach(camera => {
                if (camera.Nom_c && camera.Site) {
                    var option = document.createElement('option');
                    option.value = camera.Id_c;
                    option.textContent = `${camera.Nom_c} | ${camera.Site}`;
                    cameraSelect.appendChild(option);
                }
            });

            row1Div.appendChild(cameraSelect);

            var debutEnregistrementLabel = document.createElement('label');
            debutEnregistrementLabel.textContent = 'Débu:';
            debutEnregistrementLabel.classList.add('form-label', 'me-2');
            row1Div.appendChild(debutEnregistrementLabel);

            var debutEnregistrementInput = document.createElement('input');
            debutEnregistrementInput.type = 'datetime-local';
            debutEnregistrementInput.id = 'debut_enregistrement';
            debutEnregistrementInput.name = 'debut_enregistrement[]';
            debutEnregistrementInput.classList.add('form-control', 'me-3');
            debutEnregistrementInput.required = true;
            row1Div.appendChild(debutEnregistrementInput);

            var finEnregistrementLabel = document.createElement('label');
            finEnregistrementLabel.textContent = 'Fin:';
            finEnregistrementLabel.classList.add('form-label', 'me-2');
            row1Div.appendChild(finEnregistrementLabel);

            var finEnregistrementInput = document.createElement('input');
            finEnregistrementInput.type = 'datetime-local';
            finEnregistrementInput.id = 'fin_enregistrement';
            finEnregistrementInput.name = 'fin_enregistrement[]';
            finEnregistrementInput.classList.add('form-control', 'me-3');
            finEnregistrementInput.required = true;
            row1Div.appendChild(finEnregistrementInput);

            var removeCameraButton = document.createElement('button');
            removeCameraButton.type = 'button';
            removeCameraButton.classList.add('remove-camera', 'btn', 'btn-danger');
            removeCameraButton.innerHTML = '<i class="bi bi-trash"></i>';
            removeCameraButton.addEventListener('click', function() {
                cameraDiv.remove();
            });
            row1Div.appendChild(removeCameraButton);

            cameraDiv.appendChild(row1Div);
            cameraContainer.appendChild(cameraDiv);

            var sauvegardeRadios = document.querySelectorAll('.Sauvegarder');
            sauvegardeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    var butSection = document.getElementById('but_section');
                    if (this.value === '1') {
                        butSection.style.display = 'block';
                    } else {
                        butSection.style.display = 'none';
                    }
                });
            });
        }

        document.getElementById('add_camera').addEventListener('click', addCamera);

        var removeCameraButtons = document.querySelectorAll('.remove-camera');
        removeCameraButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.camera-section').remove();
            });
        });
    </script>
@endsection
