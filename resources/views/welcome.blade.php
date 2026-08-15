@extends('layouts.base')

@section('content')

{{-- === Section 1: Hero — Giới thiệu đầu tiên === --}}
@include('components.hero')

{{-- === Section 2: About Me — Giới thiệu bản thân === --}}
@include('components.about')

{{-- === Section 3: Skills — Kỹ năng === --}}
@include('components.skills')

{{-- === Section 3.5: Roadmap — Lộ trình học === --}}
@include('components.roadmap')

{{-- === Section 4: Projects — Dự án nổi bật === --}}
@include('components.projects')

{{-- === Section 5: Timeline — Kinh nghiệm & Học vấn === --}}
@include('components.timeline')

{{-- === Section 6: Contact — Liên hệ === --}}
@include('components.contact')

@endsection
