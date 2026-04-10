@extends('admin.layout.main')

@section('title', 'About Content')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12">
            <h3 class="fw-bold mb-1">About Us Content</h3>
            <p class="text-muted">Manage the main "About" section content and social links.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ $about ? route('admin.abouts.update', $about->id) : route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($about)
                    @method('PUT')
                @endif

                <div class="row">
                    <!-- Main Content Card -->
                    <div class="col-lg-8">
                        <div class="premium-card p-4 mb-4">
                            <h5 class="fw-bold mb-4 border-bottom pb-2">Main Section Content</h5>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Section Label</label>
                                <input type="text" name="label" class="form-control" value="{{ $about->label ?? 'ABOUT AGRISCIENCE' }}" placeholder="e.g. ABOUT AGRISCIENCE">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Section Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required value="{{ $about->title ?? '' }}" placeholder="Enter main heading">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4" required placeholder="Enter primary description...">{{ $about->description ?? '' }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium small d-flex justify-content-between">
                                    Key Features List
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" id="add-list-item">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </label>
                                <div id="list-items-container">
                                    @if($about && $about->list_items)
                                        @foreach($about->list_items as $item)
                                            <div class="input-group mb-2 list-item-row">
                                                <input type="text" name="list_items[]" class="form-control" value="{{ $item }}">
                                                <button class="btn btn-outline-danger remove-list-item" type="button"><i class="fa fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 list-item-row">
                                            <input type="text" name="list_items[]" class="form-control" placeholder="e.g. Evidence-based farming methods">
                                            <button class="btn btn-outline-danger remove-list-item" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    <!-- Footer/Social Card -->
                    <div class="premium-card p-4">
                        <h5 class="fw-bold mb-4 border-bottom pb-2">Footer Content, Contact & Social</h5>
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium small">Short Footer Bio</label>
                            <textarea name="footer_text" class="form-control" rows="3" placeholder="Empowering communities through sustainable agriculture...">{{ $about->footer_text ?? '' }}</textarea>
                        </div>

                        <div class="row">
                            <!-- Phone Numbers -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-medium small d-flex justify-content-between">
                                    Phone Numbers
                                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-2" id="add-phone">
                                        <i class="fa fa-plus small me-1"></i> Add
                                    </button>
                                </label>
                                <div id="phone-container">
                                    @if($about && $about->phone)
                                        @foreach($about->phone as $phone)
                                            <div class="input-group mb-2 array-row">
                                                <span class="input-group-text bg-light"><i class="fa fa-phone small text-muted"></i></span>
                                                <input type="text" name="phone[]" class="form-control" value="{{ $phone }}" placeholder="+254 712 345 678">
                                                <button class="btn btn-outline-danger remove-array-row" type="button"><i class="fa fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 array-row">
                                            <span class="input-group-text bg-light"><i class="fa fa-phone small text-muted"></i></span>
                                            <input type="text" name="phone[]" class="form-control" placeholder="+254 712 345 678">
                                            <button class="btn btn-outline-danger remove-array-row" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Emails -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-medium small d-flex justify-content-between">
                                    Email Addresses
                                    <button type="button" class="btn btn-sm btn-outline-info rounded-pill px-2" id="add-email">
                                        <i class="fa fa-plus small me-1"></i> Add
                                    </button>
                                </label>
                                <div id="email-container">
                                    @if($about && $about->email)
                                        @foreach($about->email as $email)
                                            <div class="input-group mb-2 array-row">
                                                <span class="input-group-text bg-light"><i class="fa fa-envelope small text-muted"></i></span>
                                                <input type="email" name="email[]" class="form-control" value="{{ $email }}" placeholder="contact@agriscience.org">
                                                <button class="btn btn-outline-danger remove-array-row" type="button"><i class="fa fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 array-row">
                                            <span class="input-group-text bg-light"><i class="fa fa-envelope small text-muted"></i></span>
                                            <input type="email" name="email[]" class="form-control" placeholder="contact@agriscience.org">
                                            <button class="btn btn-outline-danger remove-array-row" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-12 mb-4 pb-4 border-bottom">
                                <label class="form-label fw-medium small text-primary">Headquarters Address</label>
                                <textarea name="address" class="form-control" rows="2" placeholder="e.g. 123 Agri Plaza, Nairobi, Kenya">{{ $about->address ?? '' }}</textarea>
                            </div>

                            <!-- Regional Offices -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-medium small d-flex justify-content-between align-items-center mb-3">
                                    <span><i class="fa fa-globe me-1 text-primary"></i> Regional Offices</span>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3" id="add-office">
                                        <i class="fa fa-plus small me-1"></i> Add New Office
                                    </button>
                                </label>
                                
                                <div id="offices-container">
                                    @if($about && $about->regional_offices)
                                        @foreach($about->regional_offices as $index => $office)
                                            <div class="office-box p-3 border rounded mb-3 bg-light position-relative array-row">
                                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 remove-array-row">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <label class="small text-muted mb-1">Office Name</label>
                                                        <input type="text" name="regional_offices[{{ $index }}][name]" class="form-control form-control-sm" value="{{ $office['name'] ?? '' }}" placeholder="e.g. South Asia Hub">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small text-muted mb-1">Email</label>
                                                        <input type="email" name="regional_offices[{{ $index }}][email]" class="form-control form-control-sm" value="{{ $office['email'] ?? '' }}" placeholder="office@agriscience.org">
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <label class="small text-muted mb-1">Full Address</label>
                                                        <textarea name="regional_offices[{{ $index }}][address]" class="form-control form-control-sm" rows="2" placeholder="Address, City, Country...">{{ $office['address'] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-medium small text-muted">Social Media Presense</label>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small"><i class="fab fa-facebook me-1 text-primary"></i> Facebook URL</label>
                                <input type="url" name="facebook" class="form-control" value="{{ $about->facebook ?? '' }}" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small"><i class="fab fa-twitter me-1 text-info"></i> X (Twitter) URL</label>
                                <input type="url" name="twitter" class="form-control" value="{{ $about->twitter ?? '' }}" placeholder="https://x.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small"><i class="fab fa-linkedin me-1 text-primary"></i> LinkedIn URL</label>
                                <input type="url" name="linkedin" class="form-control" value="{{ $about->linkedin ?? '' }}" placeholder="https://linkedin.com/...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small"><i class="fab fa-instagram me-1 text-danger"></i> Instagram URL</label>
                                <input type="url" name="instagram" class="form-control" value="{{ $about->instagram ?? '' }}" placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-medium small"><i class="fab fa-youtube me-1 text-danger"></i> YouTube URL</label>
                                <input type="url" name="youtube" class="form-control" value="{{ $about->youtube ?? '' }}" placeholder="https://youtube.com/...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Visuals Card -->
                <div class="col-lg-4">
                    <div class="premium-card p-4 mb-4 sticky-top" style="top: 20px; z-index: 100;">
                        <h5 class="fw-bold mb-4 border-bottom pb-2">Visuals</h5>
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium small">Featured Image</label>
                            <div class="image-upload-preview mb-3">
                                @if($about && $about->image)
                                    <img src="{{ asset($about->image) }}" id="preview-img" class="img-fluid rounded border shadow-sm" style="max-height: 200px; width: 100%; object-fit: cover;">
                                @else
                                    <div id="image-placeholder" class="bg-light rounded border d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                                        <i class="fa fa-image fa-3x opacity-25"></i>
                                    </div>
                                    <img src="" id="preview-img" class="img-fluid rounded border shadow-sm d-none" style="max-height: 200px; width: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <input type="file" name="image" class="form-control" id="image-input" accept="image/*">
                            <small class="text-muted small">Recommended: Large landscape image.</small>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label fw-medium small">Experience Counter (e.g. 12+)</label>
                            <input type="text" name="experience_years" class="form-control" value="{{ $about->experience_years ?? '' }}" placeholder="e.g. 12+">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium small">Counter Label (e.g. Years of Service)</label>
                            <input type="text" name="experience_text" class="form-control" value="{{ $about->experience_text ?? '' }}" placeholder="e.g. Years of Service">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold mt-4">
                            <i class="fa fa-save me-2"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview Image
        const imgInput = document.getElementById('image-input');
        const previewImg = document.getElementById('preview-img');
        const placeholder = document.getElementById('image-placeholder');

        imgInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('d-none');
                    if(placeholder) placeholder.classList.add('d-none');
                }
                reader.readAsDataURL(file);
            }
        });

        // Dynamic Rows Handler (Simple Arrays)
        const setupDynamicRows = (addButtonId, containerId, name, icon, placeholder) => {
            const container = document.getElementById(containerId);
            const addButton = document.getElementById(addButtonId);

            if(!addButton || !container) return;

            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'input-group mb-2 array-row animate__animated animate__fadeInDown';
                newRow.innerHTML = `
                    <span class="input-group-text bg-light"><i class="fa ${icon} small text-muted"></i></span>
                    <input type="${name === 'email' ? 'email' : 'text'}" name="${name}[]" class="form-control" placeholder="${placeholder}">
                    <button class="btn btn-outline-danger remove-array-row" type="button"><i class="fa fa-times"></i></button>
                `;
                container.appendChild(newRow);
            });
        };

        // Initialize Dynamic Rows
        setupDynamicRows('add-list-item', 'list-items-container', 'list_items', 'fa-check', 'Add another point...');
        setupDynamicRows('add-phone', 'phone-container', 'phone', 'fa-phone', '+254 712 345 678');
        setupDynamicRows('add-email', 'email-container', 'email', 'fa-envelope', 'contact@agriscience.org');

        // Complex Rows Handler (Regional Offices)
        const addOfficeBtn = document.getElementById('add-office');
        const officeContainer = document.getElementById('offices-container');
        
        if (addOfficeBtn && officeContainer) {
            addOfficeBtn.addEventListener('click', function() {
                const index = officeContainer.querySelectorAll('.office-box').length;
                const newOffice = document.createElement('div');
                newOffice.className = 'office-box p-3 border rounded mb-3 bg-light position-relative array-row animate__animated animate__fadeInDown';
                newOffice.innerHTML = `
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 remove-array-row">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="small text-muted mb-1">Office Name</label>
                            <input type="text" name="regional_offices[${index}][name]" class="form-control form-control-sm" placeholder="e.g. South Asia Hub">
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted mb-1">Email</label>
                            <input type="email" name="regional_offices[${index}][email]" class="form-control form-control-sm" placeholder="office@agriscience.org">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="small text-muted mb-1">Full Address</label>
                            <textarea name="regional_offices[${index}][address]" class="form-control form-control-sm" rows="2" placeholder="Address, City, Country..."></textarea>
                        </div>
                    </div>
                `;
                officeContainer.appendChild(newOffice);
            });
        }

        // Remove Rows (Event Delegation)
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-array-row')) {
                const row = e.target.closest('.array-row');
                const container = row.parentElement;
                
                // For nested fields or simple fields
                row.classList.remove('animate__fadeInDown');
                row.classList.add('animate__fadeOut');
                setTimeout(() => row.remove(), 300);
            }
        });
    });
</script>
@endsection
