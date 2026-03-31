@php
    $groups = $galleryGroups ?? null;
    if ($groups === null || ! is_array($groups) || count($groups) === 0) {
        $groups = [['title' => '', 'images' => []]];
    }
@endphp
<div class="mb-3">
    <label class="form-label">Galeri (gruplar)</label>
    <p class="text-muted small mb-2">Her grup için başlık ve görseller tanımlayın. Proje detay sayfasında &quot;Proje Galerisi&quot; altında başlıklarla listelenir.</p>
    <div id="gallery-groups-container">
        @foreach($groups as $gi => $group)
            <div class="gallery-group-card card border-secondary mb-3" data-group-index="{{ $gi }}">
                <div class="card-header bg-light d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <input type="text" class="form-control form-control-sm" style="max-width: 280px;"
                           name="gallery_groups[{{ $gi }}][title]"
                           value="{{ old('gallery_groups.'.$gi.'.title', $group['title'] ?? '') }}"
                           placeholder="Grup başlığı (örn: İnşaat aşaması)">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-gallery-group-btn">
                        <i class="fas fa-trash"></i> Grubu kaldır
                    </button>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-2">Mevcut görseller</p>
                    <div class="row g-2 mb-3 gallery-group-existing">
                        @foreach($group['images'] ?? [] as $path)
                            <div class="col-md-3 gallery-existing-item">
                                <input type="hidden" name="gallery_groups[{{ $gi }}][existing][]" value="{{ $path }}">
                                <div class="border rounded p-2 bg-light text-center">
                                    <img src="{{ asset('storage/'.$path) }}" class="img-thumbnail w-100 mb-1" style="height:90px;object-fit:cover;" alt="">
                                    <button type="button" class="btn btn-sm btn-danger w-100 remove-existing-gallery-img">Kaldır</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <label class="form-label small mb-1">Bu gruba yeni görsel ekle</label>
                    <p class="text-muted small mb-2">İsterseniz bir satırda birden fazla dosya seçebilirsiniz; daha sonra tekrar seçmek için &quot;Başka görsel ekle&quot;ye basın.</p>
                    <div class="gallery-new-uploads border rounded p-2 bg-light" data-group-index="{{ $gi }}">
                        <div class="gallery-new-file-rows">
                            <div class="d-flex align-items-stretch gap-2 mb-2 gallery-new-file-row">
                                <input type="file" class="form-control form-control-sm flex-grow-1" name="gallery_groups[{{ $gi }}][new][]" accept="image/*" multiple>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary add-gallery-new-file-row">
                            <i class="fas fa-plus"></i> Başka görsel ekle
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-gallery-group-btn">
        <i class="fas fa-plus"></i> Yeni grup ekle
    </button>
</div>

@push('scripts')
<script>
(function() {
    let galleryGroupNextIndex = {{ count($groups) }};
    const container = document.getElementById('gallery-groups-container');
    const addBtn = document.getElementById('add-gallery-group-btn');
    if (!container || !addBtn) return;

    function cardHtml(index) {
        return `
        <div class="gallery-group-card card border-secondary mb-3" data-group-index="${index}">
            <div class="card-header bg-light d-flex flex-wrap justify-content-between align-items-center gap-2">
                <input type="text" class="form-control form-control-sm" style="max-width: 280px;"
                       name="gallery_groups[${index}][title]" value="" placeholder="Grup başlığı">
                <button type="button" class="btn btn-sm btn-outline-danger remove-gallery-group-btn">
                    <i class="fas fa-trash"></i> Grubu kaldır
                </button>
            </div>
            <div class="card-body">
                <p class="small text-muted mb-2">Mevcut görseller</p>
                <div class="row g-2 mb-3 gallery-group-existing"></div>
                <label class="form-label small mb-1">Bu gruba yeni görsel ekle</label>
                <p class="text-muted small mb-2">İsterseniz bir satırda birden fazla dosya seçebilirsiniz; daha sonra tekrar seçmek için &quot;Başka görsel ekle&quot;ye basın.</p>
                <div class="gallery-new-uploads border rounded p-2 bg-light" data-group-index="${index}">
                    <div class="gallery-new-file-rows">
                        <div class="d-flex align-items-stretch gap-2 mb-2 gallery-new-file-row">
                            <input type="file" class="form-control form-control-sm flex-grow-1" name="gallery_groups[${index}][new][]" accept="image/*" multiple>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary add-gallery-new-file-row">
                        <i class="fas fa-plus"></i> Başka görsel ekle
                    </button>
                </div>
            </div>
        </div>`;
    }

    addBtn.addEventListener('click', function() {
        const i = galleryGroupNextIndex++;
        container.insertAdjacentHTML('beforeend', cardHtml(i));
    });

    function appendNewFileRow(wrap) {
        const idx = wrap.getAttribute('data-group-index');
        const rows = wrap.querySelector('.gallery-new-file-rows');
        if (!rows || idx === null) return;
        const div = document.createElement('div');
        div.className = 'd-flex align-items-stretch gap-2 mb-2 gallery-new-file-row';
        div.innerHTML =
            '<input type="file" class="form-control form-control-sm flex-grow-1" name="gallery_groups[' + idx + '][new][]" accept="image/*" multiple>' +
            '<button type="button" class="btn btn-sm btn-outline-danger remove-gallery-new-file-row flex-shrink-0" title="Bu satırı kaldır"><i class="fas fa-times"></i></button>';
        rows.appendChild(div);
    }

    container.addEventListener('click', function(e) {
        if (e.target.closest('.add-gallery-new-file-row')) {
            e.preventDefault();
            const wrap = e.target.closest('.gallery-new-uploads');
            if (wrap) appendNewFileRow(wrap);
        }
        if (e.target.closest('.remove-gallery-new-file-row')) {
            e.preventDefault();
            const row = e.target.closest('.gallery-new-file-row');
            const rowsEl = row && row.parentElement;
            if (!row || !rowsEl) return;
            const all = rowsEl.querySelectorAll('.gallery-new-file-row');
            if (all.length > 1) row.remove();
        }
        if (e.target.closest('.remove-existing-gallery-img')) {
            e.preventDefault();
            const item = e.target.closest('.gallery-existing-item');
            if (item) item.remove();
        }
        if (e.target.closest('.remove-gallery-group-btn')) {
            e.preventDefault();
            const card = e.target.closest('.gallery-group-card');
            if (card && container.querySelectorAll('.gallery-group-card').length > 1) {
                card.remove();
            } else if (card) {
                alert('En az bir galeri grubu alanı kalmalıdır. İsterseniz başlığı boş bırakıp görselleri kaldırın ve kaydedin.');
            }
        }
    });
})();
</script>
@endpush
