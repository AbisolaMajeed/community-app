<div>
    @if ($status == true)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Thanks for your message! We will get back to you soon!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <div wire:loading>
        <h6 class="mb-2">Sending...</h6>
    </div> --}}
    <div class="form-group">
        <input type="text" class="form-control" id="name" placeholder="Your Name" wire:model="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-3">
        <input type="email" class="form-control" id="email" placeholder="Your Email" wire:model="email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-3">
        <input type="subject" class="form-control" id="subject" placeholder="Subject" wire:model="subject">
        @error('subject')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-3">
        <textarea class="form-control" id="message" rows="5" placeholder="Message" wire:model="message"></textarea>
        @error('message')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="text-center"><button type="submit" wire:click="submit">Send Message</button></div>
</div>
