<div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth">
    <div class="modal-content">
        <div class="modal-header bg-transparent" style="border-bottom: 1px solid #3b4253;">
            <h3 class="modal-title"> Medya </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-5 px-sm-5 mx-50 overflow-scroll h-100" style="max-height: calc(100vh - 500px)">
            <div class="row position-relative">
				<?php $mediaData = \Illuminate\Database\Capsule\Manager::table('media')->where('license', auth()->get('licenseId'))->get()->all(); ?>
                <div class="col-12">
                    <div class="card rounded border p-5 text-center rounded text-primary mb-2 bg-transparent shadow-none"
                         style="border: 2px dashed #7367f0!important;">
                        Buraya Sürükle Ve Bırak
                    </div>
                </div>
                @foreach($mediaData as $media)
                    <div class="col-3">
                        <div class="card rounded border">
                            <label for="so-{{md5($media->image)}}" style="position: relative">
                                <img class="card-img-top img-fluid rounded"
                                     src="{{imageUrl('media/' . $media->image)}}"
                                     style="height: 125px; width: 100%; object-fit: cover;border-bottom: 1px solid #3b4253"
                                     alt="{{$media->alternative}}">
                                <input type="checkbox"
                                       key="{{$media->id}}"
                                       style="position: absolute; bottom: 5px; right: 5px"
                                       class="form-check-input media-select"
                                       id="so-{{md5($media->image)}}">
                            </label>
                            <div class="card-body">
                                <p class="card-title text-truncate mb-0 font-medium-1">{{$media->title}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer" style="display: flex;">
            <div class="input-group me-1" style="flex: 1">
                <input type="text" class="form-control" placeholder="Ne aramıştın?">
                <button class="btn btn-primary waves-effect" type="button">
                    <i class="far fa-search"></i>
                </button>
            </div>
            <button class="btn btn-primary w-auto" data-bs-dismiss="modal" type="button">Seç</button>
        </div>
    </div>
</div>