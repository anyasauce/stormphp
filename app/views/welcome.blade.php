@extends('layouts.welcome')
@section('title', 'Welcome to PHP Storm')
@section('content')
    <section class="hero-section">
        <div class="hero-container">
            <div class="version-badge">
                <i class="fas fa-bolt"></i> StormPHP 1.0
            </div>
            
            <div class="logo-wrapper">
                <img src="/assets/images/stormphplogo.png" alt="StormPHP Logo" class="custom-logo">
                <div class="glow"></div>
            </div>
            
            <h1>Welcome to StormPHP</h1>
            <p>A lightning-fast PHP framework built on Laravel 12 for developers who demand exceptional performance and elegant solutions.</p>
            
            <div>
                <a href="/register" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket me-2"></i> Get Started
                </a>
                <a href="/" class="btn btn-secondary btn-lg">
                    <i class="fas fa-book me-2"></i> Documentation
                </a>
            </div>
            
            <div class="feature-icons">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                    <span>Lightning Fast</span>
                </div>
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure</span>
                </div>
                <div class="feature-icon">
                    <i class="fas fa-code"></i>
                    <span>Modern Syntax</span>
                </div>
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                    <span>Extensible</span>
                </div>
            </div>
        </div>
    </section>
@endsection
