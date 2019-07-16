<style>
@keyframes preloaderLeft {
    30% {
        width: 0;
        right: 50%;
        opacity: 1;
    }
    50% {
        width: 50%;
        right: 50%;
        opacity: 1;
    }
    70% {
        width: 0;
        right: 100%;
        opacity: 0;
    }
}

@keyframes preloaderRight {
    30% {
        width: 0;
        left: 50%;
        opacity: 1;
    }
    50% {
        width: 50%;
        left: 50%;
        opacity: 1;
    }
    70% {
        width: 0;
        left: 100%;
        opacity: 0;
    }
}

.preloader {
    display: flex;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: #565652;
    z-index: 9999;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.preloader.hidden {
    opacity: 0;
}

.preloader-logo {
    text-align: center;
    margin-bottom: 17px;
}

.preloader-logo__name {
    color: #babab8;
    font-size: 20px;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1;
    margin-bottom: 3px;
    letter-spacing: 0.25px;
}

.preloader-logo__desc {
    color: #878784;
    font-size: 11px;
    font-weight: 400;
    letter-spacing: 1.4px;
}

.preloader-line {
    background: #686864;
    width: 190px;
    height: 3px;
    position: relative;
}

.preloader-line::before {
    content: '';
    position: absolute;
    right: 50%;
    top: 0;
    height: 100%;
    width: 0;
    background: #ecc12d;
    animation: preloaderLeft 2s infinite;
}

.preloader-line::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    height: 100%;
    width: 0;
    background: #ecc12d;
    animation: preloaderRight 2s infinite;
}
</style>

<div class="preloader" style="clip-path: url(#preloader-path)">
    <div class="preloader-logo">
        <div class="preloader-logo__name">Домашний уют</div>
        <div class="preloader-logo__desc">Магазин корпусной мебели</div>
    </div>
    <div class="preloader-line"></div>
    <svg height="0" width="0">
        <defs>
            <clipPath id="preloader-path" clipPathUnits="objectBoundingBox">
                <path d="M0 0 H 1 V 1 H 0 Z" />
            </clipPath>
        </defs>
    </svg>
</div>