<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription — TryAnime</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        :root {
            --bg: #080810;
            --surface: #0f0f1a;
            --card: #13131f;
            --border: rgba(255, 255, 255, 0.06);
            --accent: #e63946;
            --accent2: #ff6b35;
            --gold: #f4c430;
            --text: #e8e8f0;
            --muted: #6b6b80;
            --glow: rgba(230, 57, 70, 0.4);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
            cursor: none;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
            opacity: 0.03;
            pointer-events: none;
            z-index: 9997;
        }

        /* CURSOR */
        .cursor {
            position: fixed;
            width: 10px;
            height: 10px;
            background: var(--accent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s, width 0.2s, height 0.2s;
            mix-blend-mode: difference;
        }

        .cursor-ring {
            position: fixed;
            width: 36px;
            height: 36px;
            border: 1.5px solid var(--accent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.2s, height 0.2s;
            opacity: 0.5;
        }

        /* NAVBAR */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom, rgba(8, 8, 16, 0.95), transparent);
            backdrop-filter: blur(2px);
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            letter-spacing: 0.1em;
            color: var(--text);
            text-decoration: none;
        }

        .logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 36px;
            list-style: none;
        }

        .nav-links a {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        .nav-actions {
            display: flex;
            gap: 14px;
            align-items: center;
        }

        /* BUTTONS */
        .btn {
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 10px 22px;
            border-radius: 2px;
            cursor: none;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
        }

        .btn-ghost:hover {
            border-color: rgba(255, 255, 255, 0.2);
            color: var(--text);
        }

        .btn-primary {
            background: var(--accent);
            border: 1px solid var(--accent);
            color: #fff;
            box-shadow: 0 0 20px var(--glow);
        }

        .btn-primary:hover {
            background: #ff4757;
            box-shadow: 0 0 30px var(--glow);
            transform: translateY(-1px);
        }

        /* PAGE LAYOUT */
        .register-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1.1fr;
        }

        /* LEFT — Visual */
        .reg-visual {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 120px 48px 56px;
        }

        .reg-visual-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 70% at 30% 20%, rgba(230, 57, 70, 0.14) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 75%, rgba(255, 107, 53, 0.07) 0%, transparent 55%),
                linear-gradient(160deg, #0d0d1a 0%, #080810 100%);
        }

        .reg-visual-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.018) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.018) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.5) 30%, rgba(0, 0, 0, 0.15) 100%);
        }

        .reg-visual-overlay {
            position: absolute;
            inset: 0;
            z-index: 1;
            background:
                linear-gradient(to right, transparent 55%, rgba(8, 8, 16, 0.55) 100%),
                linear-gradient(to top, rgba(8, 8, 16, 0.85) 0%, transparent 45%);
        }

        /* Floating cards */
        .visual-cards {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .float-card {
            position: absolute;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.8), 0 0 0 1px var(--border);
        }

        .float-card .card-inner {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px 8px;
        }

        .card-label {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.2;
        }

        .card-eps {
            font-size: 0.6rem;
            color: var(--accent);
            letter-spacing: 0.08em;
            margin-top: 2px;
        }

        .vc1 {
            width: 100px;
            height: 148px;
            top: 16%;
            left: 6%;
            background: linear-gradient(160deg, #1e0a0c, #2e1015);
            animation: float 7s ease-in-out infinite;
        }

        .vc2 {
            width: 85px;
            height: 122px;
            top: 10%;
            left: 34%;
            background: linear-gradient(160deg, #0a0f20, #10182e);
            animation: float 6s ease-in-out infinite;
            animation-delay: -2s;
        }

        .vc3 {
            width: 115px;
            height: 165px;
            top: 40%;
            left: 16%;
            background: linear-gradient(160deg, #0f1a0a, #1a2e10);
            animation: float 8.5s ease-in-out infinite;
            animation-delay: -4s;
        }

        .vc4 {
            width: 88px;
            height: 128px;
            top: 32%;
            left: 52%;
            background: linear-gradient(160deg, #1a150a, #2e2310);
            animation: float 5.5s ease-in-out infinite;
            animation-delay: -1s;
        }

        .vc5 {
            width: 102px;
            height: 148px;
            top: 60%;
            left: 38%;
            background: linear-gradient(160deg, #120a1e, #1e102e);
            animation: float 9s ease-in-out infinite;
            animation-delay: -3s;
        }

        .vc6 {
            width: 78px;
            height: 112px;
            top: 56%;
            left: 60%;
            background: linear-gradient(160deg, #0a1818, #102820);
            animation: float 6.5s ease-in-out infinite;
            animation-delay: -5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-16px);
            }
        }

        /* Steps guide (left) */
        .visual-top {
            position: relative;
            z-index: 2;
        }

        .steps-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 24px;
        }

        .steps {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
            opacity: 0.4;
            transition: opacity 0.3s;
        }

        .step-item:last-child {
            border-bottom: none;
        }

        .step-item.active {
            opacity: 1;
        }

        .step-item.done {
            opacity: 0.65;
        }

        .step-num {
            width: 28px;
            height: 28px;
            border: 1px solid var(--border);
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 0.9rem;
            color: var(--muted);
            flex-shrink: 0;
            transition: background 0.3s, border-color 0.3s, color 0.3s;
        }

        .step-item.active .step-num {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
            box-shadow: 0 0 12px var(--glow);
        }

        .step-item.done .step-num {
            background: rgba(230, 57, 70, 0.15);
            border-color: rgba(230, 57, 70, 0.4);
            color: var(--accent);
        }

        .step-title {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text);
            letter-spacing: 0.04em;
        }

        .step-desc {
            font-size: 0.72rem;
            color: var(--muted);
            margin-top: 2px;
            line-height: 1.4;
        }

        /* Visual bottom */
        .visual-bottom {
            position: relative;
            z-index: 2;
        }

        .visual-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 14px;
            padding: 6px 12px;
            border: 1px solid rgba(230, 57, 70, 0.3);
            border-radius: 2px;
            background: rgba(230, 57, 70, 0.05);
        }

        .visual-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .visual-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.2rem, 4vw, 3.6rem);
            line-height: 0.92;
            letter-spacing: 0.02em;
            margin-bottom: 12px;
        }

        .visual-title .stroke {
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.22);
            color: transparent;
        }

        .visual-title .accent {
            color: var(--accent);
        }

        .visual-desc {
            font-size: 0.85rem;
            line-height: 1.7;
            color: var(--muted);
            max-width: 360px;
        }

        /* RIGHT — Form */
        .reg-form-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 100px 64px 56px;
            background: var(--surface);
            border-left: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .reg-form-side::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(230, 57, 70, 0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Progress bar */
        .progress-wrap {
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .progress-meta {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 10px;
        }

        .progress-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
        }

        .progress-count {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.1rem;
            color: var(--muted);
            letter-spacing: 0.08em;
        }

        .progress-count span {
            color: var(--text);
        }

        .progress-bar {
            height: 2px;
            background: var(--border);
            border-radius: 1px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            border-radius: 1px;
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 10px rgba(230, 57, 70, 0.5);
        }

        /* Heading */
        .form-heading {
            margin-bottom: 28px;
        }

        .form-tag {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 8px;
        }

        .form-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.6rem;
            letter-spacing: 0.04em;
            line-height: 1;
            margin-bottom: 6px;
        }

        .form-subtitle {
            font-size: 0.83rem;
            color: var(--muted);
        }

        .form-subtitle a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .form-subtitle a:hover {
            color: #ff4757;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 22px 0;
        }

        /* Step panels */
        .step-panel {
            display: none;
            animation: fadeUp 0.4s ease both;
        }

        .step-panel.active {
            display: block;
        }

        /* Form fields */
        .form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg.fi {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: var(--muted);
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap:focus-within svg.fi {
            color: var(--accent);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 2px;
            padding: 11px 14px 11px 42px;
            font-family: 'Inter', sans-serif;
            font-size: 0.88rem;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
        }

        input::placeholder {
            color: #2a2a42;
        }

        select {
            color: var(--muted);
            cursor: none;
        }

        select option {
            background: var(--card);
            color: var(--text);
        }

        input:focus,
        select:focus {
            border-color: rgba(230, 57, 70, 0.5);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.07);
        }

        /* Eye toggle */
        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: none;
            color: var(--muted);
            padding: 2px;
            transition: color 0.2s;
        }

        .eye-btn:hover {
            color: var(--text);
        }

        .eye-btn svg {
            width: 15px;
            height: 15px;
            display: block;
        }

        .has-eye input {
            padding-right: 42px;
        }

        /* Strength */
        .strength {
            margin-top: 6px;
            display: none;
        }

        .strength.visible {
            display: block;
        }

        .strength-bar {
            height: 2px;
            background: var(--border);
            border-radius: 1px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 1px;
            transition: width 0.35s, background 0.35s;
        }

        .strength-label {
            font-size: 0.68rem;
            margin-top: 5px;
            color: var(--muted);
            letter-spacing: 0.06em;
        }

        /* Error */
        .error-msg {
            font-size: 0.7rem;
            color: var(--accent);
            display: none;
            letter-spacing: 0.04em;
        }

        .field.has-error input,
        .field.has-error select {
            border-color: var(--accent);
        }

        .field.has-error .error-msg {
            display: block;
        }

        /* Avatar picker */
        .avatar-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .avatar-opt {
            display: none;
        }

        .avatar-label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            aspect-ratio: 1;
            border: 1px solid var(--border);
            border-radius: 2px;
            cursor: none;
            font-size: 1.6rem;
            background: var(--card);
            transition: border-color 0.2s, background 0.2s, transform 0.15s;
            user-select: none;
        }

        .avatar-label:hover {
            border-color: rgba(230, 57, 70, 0.4);
            background: #1a1a2a;
            transform: translateY(-2px);
        }

        .avatar-opt:checked+.avatar-label {
            border-color: var(--accent);
            background: rgba(230, 57, 70, 0.08);
            box-shadow: 0 0 12px rgba(230, 57, 70, 0.2);
        }

        /* Checkbox */
        .check-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: none;
        }

        .check-label input[type="checkbox"] {
            display: none;
        }

        .check-box {
            width: 16px;
            height: 16px;
            min-width: 16px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 2px;
            background: var(--card);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1px;
            transition: background 0.2s, border-color 0.2s;
        }

        .check-box svg {
            width: 10px;
            height: 10px;
            color: #fff;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .check-label input:checked~.check-box {
            background: var(--accent);
            border-color: var(--accent);
        }

        .check-label input:checked~.check-box svg {
            opacity: 1;
        }

        .check-text {
            font-size: 0.78rem;
            color: var(--muted);
            line-height: 1.5;
        }

        .check-text a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .check-text a:hover {
            color: #ff4757;
        }

        /* Nav buttons */
        .form-nav {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        .btn-back {
            flex: 0 0 auto;
            padding: 12px 20px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 2px;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            color: var(--muted);
            cursor: none;
            transition: all 0.2s;
        }

        .btn-back:hover {
            border-color: rgba(255, 255, 255, 0.18);
            color: var(--text);
        }

        .btn-next,
        .btn-submit-final {
            flex: 1;
            padding: 13px;
            background: var(--accent);
            border: 1px solid var(--accent);
            border-radius: 2px;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1rem;
            letter-spacing: 0.14em;
            color: #fff;
            cursor: none;
            box-shadow: 0 0 20px var(--glow);
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .btn-next::after,
        .btn-submit-final::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-next:hover::after,
        .btn-submit-final:hover::after {
            opacity: 1;
        }

        .btn-next:hover,
        .btn-submit-final:hover {
            background: #ff4757;
            box-shadow: 0 0 32px var(--glow);
            transform: translateY(-1px);
        }

        /* OR + OAuth */
        .or-sep {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .or-sep span {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .or-sep p {
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .oauth-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .btn-oauth {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 2px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            color: var(--muted);
            cursor: none;
            transition: border-color 0.2s, color 0.2s, background 0.2s;
        }

        .btn-oauth:hover {
            border-color: rgba(255, 255, 255, 0.15);
            color: var(--text);
            background: #1a1a28;
        }

        .btn-oauth svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        /* Success screen */
        .success-screen {
            display: none;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 40px 0;
            animation: fadeUp 0.5s ease both;
        }

        .success-screen.active {
            display: flex;
        }

        .success-icon {
            width: 72px;
            height: 72px;
            border: 1px solid rgba(230, 57, 70, 0.4);
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            animation: ripple 2s infinite;
            background: rgba(230, 57, 70, 0.06);
        }

        .success-icon svg {
            width: 32px;
            height: 32px;
            color: var(--accent);
        }

        .success-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.8rem;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
        }

        .success-title span {
            color: var(--accent);
        }

        .success-desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.7;
            max-width: 340px;
            margin-bottom: 32px;
        }

        /* Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(0.8);
            }
        }

        @keyframes ripple {
            0% {
                box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.5);
            }

            70% {
                box-shadow: 0 0 0 20px rgba(230, 57, 70, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(230, 57, 70, 0);
            }
        }

        .fade-1 {
            animation: fadeUp 0.55s ease 0.05s both;
        }

        .fade-2 {
            animation: fadeUp 0.55s ease 0.15s both;
        }

        .fade-3 {
            animation: fadeUp 0.55s ease 0.25s both;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent);
            border-radius: 2px;
        }

        @media (max-width: 960px) {
            .register-page {
                grid-template-columns: 1fr;
            }

            .reg-visual {
                display: none;
            }

            .reg-form-side {
                padding: 100px 28px 48px;
                border-left: none;
            }

            nav {
                padding: 16px 24px;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="cursor" id="cursor"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <nav>
        <a href="{{ url('/') }}" class="logo">Try<span>Anime</span></a>
        <ul class="nav-links">
            <li><a href="#">Catalogue</a></li>
            <li><a href="#">Tendances</a></li>
            <li><a href="#">Genres</a></li>
            <li><a href="#">Communauté</a></li>
        </ul>
        <div class="nav-actions">
            <a href="{{ url('/login') }}" class="btn btn-primary">Connexion</a>
        </div>
    </nav>

    <div class="register-page">
        <form action="{{ url('register') }}" method="POST">
            @csrf

            <!-- LEFT -->
            <div class="reg-visual">
                <div class="reg-visual-bg"></div>
                <div class="reg-visual-grid"></div>
                <div class="reg-visual-overlay"></div>
                <div class="visual-cards">
                    <div class="float-card vc1">
                        <div class="card-inner">
                            <div class="card-label">DEMON<br>SLAYER</div>
                            <div class="card-eps">26 ÉP.</div>
                        </div>
                    </div>
                    <div class="float-card vc2">
                        <div class="card-inner">
                            <div class="card-label">JJK</div>
                            <div class="card-eps">24 ÉP.</div>
                        </div>
                    </div>
                    <div class="float-card vc3">
                        <div class="card-inner">
                            <div class="card-label">ATTACK<br>ON TITAN</div>
                            <div class="card-eps">87 ÉP.</div>
                        </div>
                    </div>
                    <div class="float-card vc4">
                        <div class="card-inner">
                            <div class="card-label">ONE<br>PIECE</div>
                            <div class="card-eps">1000+</div>
                        </div>
                    </div>
                    <div class="float-card vc5">
                        <div class="card-inner">
                            <div class="card-label">BLEACH</div>
                            <div class="card-eps">366 ÉP.</div>
                        </div>
                    </div>
                    <div class="float-card vc6">
                        <div class="card-inner">
                            <div class="card-label">NARUTO</div>
                            <div class="card-eps">720 ÉP.</div>
                        </div>
                    </div>
                </div>

                <div class="visual-top"></div>

                <div class="visual-bottom">
                    <div class="visual-badge">Rejoins la communauté</div>
                    <h2 class="visual-title">CRÉE TON<br><span class="stroke">UNIVERS</span><br><span class="accent">ANIME</span></h2>
                    <p class="visual-desc">Suis tes séries, note tes épisodes et découvre des milliers d'animés avec une communauté passionnée.</p>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="reg-form-side">

                <div class="progress-wrap fade-1">
                    <div class="progress-meta">
                        <div class="progress-label" id="progressLabel">Informations</div>
                        <div class="progress-count"><span id="progressCurrent">1</span> / 2</div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill" style="width:50%"></div>
                    </div>
                </div>

                <div class="form-heading fade-2">
                    <div class="form-tag" id="formTag">Étape 1 sur 2</div>
                    <h1 class="form-title" id="formTitle">Tes infos</h1>
                    <p class="form-subtitle">Déjà membre ? <a href="{{ url('/login') }}">Se connecter</a></p>
                </div>

                <div class="divider fade-3"></div>

                <div class="steps-container">

                    <!-- STEP 1 -->
                    <div class="step-panel active" id="step1">
                        <div class="form">
                            <div class="row-2">
                                <div class="field" id="f-prenom">
                                    <label>Prénom</label>
                                    <div class="input-wrap">
                                        <input name="prenom" type="text" id="prenom" placeholder="Ichigo" />
                                        <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span class="error-msg">Prénom requis</span>
                                </div>
                                <div class="field" id="f-nom">
                                    <label>Nom</label>
                                    <div class="input-wrap">
                                        <input name="nom" type="text" id="nom" placeholder="Kurosaki" />
                                        <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span class="error-msg">Nom requis</span>
                                </div>
                            </div>
                            <div class="field" id="f-pseudo">
                                <label>Pseudo</label>
                                <div class="input-wrap">
                                    <input name="pseudo" type="text" id="pseudo" placeholder="ShinigamiXX" />
                                    <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 16c2.5 0 4.847.832 6.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <span class="error-msg">Pseudo requis</span>
                            </div>
                            <div class="field" id="f-email">
                                <label>Adresse e-mail</label>
                                <div class="input-wrap">
                                    <input name="email" type="email" id="email" placeholder="ichigo@tryanime.tv" />
                                    <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="error-msg">E-mail invalide</span>
                            </div>
                            <div class="form-nav">
                                <button type="button" class="btn-next" onclick="nextStep(1)">
                                    Continuer →
                                </button>
                            </div>
                            <div class="or-sep"><span></span>
                                <p>ou s'inscrire avec</p><span></span>
                            </div>
                            <div class="oauth-row">
                                <button type="button" class="btn-oauth">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                                    </svg>
                                    Google
                                </button>
                                <button type="button" class="btn-oauth">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z" />
                                    </svg>
                                    GitHub
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2 -->
                    <div class="step-panel" id="step2">
                        <div class="form">
                            <div class="field" id="f-password">
                                <label>Mot de passe</label>
                                <div class="input-wrap has-eye">
                                    <input name="password" type="password" id="password" placeholder="••••••••" />
                                    <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <button type="button" class="eye-btn" id="eye1"><svg id="eyeIco1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg></button>
                                </div>
                                <div class="strength" id="strength">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="sFill"></div>
                                    </div>
                                    <div class="strength-label" id="sLabel">Robustesse</div>
                                </div>
                                <span class="error-msg">8 caractères minimum</span>
                            </div>
                            <div class="field" id="f-confirm">
                                <label>Confirmer le mot de passe</label>
                                <div class="input-wrap has-eye">
                                    <input name="confirm" type="password" id="confirm" placeholder="••••••••" />
                                    <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <button type="button" class="eye-btn" id="eye2"><svg id="eyeIco2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg></button>
                                </div>
                                <span class="error-msg">Les mots de passe ne correspondent pas</span>
                            </div>
                            <div class="form-nav">
                                <button type="button" class="btn-back" onclick="prevStep(2)">← Retour</button>
                                <button type="button" class="btn-submit-final" onclick="submitForm()">
                                    Créer mon compte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SUCCESS -->
                <div class="success-screen" id="successScreen">
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h2 class="success-title">BIENVENUE<br><span id="successPseudo">SENPAI</span></h2>
                    <p class="success-desc">Ton compte a été créé avec succès. Tu fais désormais partie de la communauté TryAnime. Prêt à explorer des milliers d'animés ?</p>
                    <button type="submit" class="btn btn-primary" style="font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:0.14em;padding:14px 36px;">Accéder au catalogue</button>
                </div>
        </form>
    </div>
    </div>

    <script>
        /* CURSOR */
        const cur = document.getElementById('cursor'),
            ring = document.getElementById('cursorRing');
        let mx = 0,
            my = 0,
            rx = 0,
            ry = 0;
        document.addEventListener('mousemove', e => {
            mx = e.clientX;
            my = e.clientY;
            cur.style.left = mx + 'px';
            cur.style.top = my + 'px';
        });
        (function anim() {
            rx += (mx - rx) * 0.12;
            ry += (my - ry) * 0.12;
            ring.style.left = rx + 'px';
            ring.style.top = ry + 'px';
            requestAnimationFrame(anim);
        })();
        document.querySelectorAll('a,button,input,label,select').forEach(el => {
            el.addEventListener('mouseenter', () => {
                cur.style.transform = 'translate(-50%,-50%) scale(2.2)';
                ring.style.width = ring.style.height = '50px';
            });
            el.addEventListener('mouseleave', () => {
                cur.style.transform = 'translate(-50%,-50%) scale(1)';
                ring.style.width = ring.style.height = '36px';
            });
        });

        /* EYE TOGGLES */
        function makeEye(inp, btn, ico) {
            document.getElementById(btn).addEventListener('click', () => {
                const el = document.getElementById(inp),
                    show = el.type === 'password';
                el.type = show ? 'text' : 'password';
                document.getElementById(ico).style.opacity = show ? '0.3' : '1';
            });
        }
        makeEye('password', 'eye1', 'eyeIco1');
        makeEye('confirm', 'eye2', 'eyeIco2');

        /* PASSWORD STRENGTH */
        const lvls = [{
                color: '#e63946',
                text: 'Très faible',
                w: '18%'
            },
            {
                color: '#f97316',
                text: 'Faible',
                w: '36%'
            },
            {
                color: '#eab308',
                text: 'Moyen',
                w: '56%'
            },
            {
                color: '#22c55e',
                text: 'Fort',
                w: '78%'
            },
            {
                color: '#10b981',
                text: 'Très fort',
                w: '100%'
            },
        ];
        document.getElementById('password').addEventListener('input', function() {
            const v = this.value,
                bar = document.getElementById('strength');
            if (!v) {
                bar.classList.remove('visible');
                return;
            }
            bar.classList.add('visible');
            let s = 0;
            if (v.length >= 8) s++;
            if (v.length >= 12) s++;
            if (/[A-Z]/.test(v)) s++;
            if (/[0-9]/.test(v)) s++;
            if (/[^A-Za-z0-9]/.test(v)) s++;
            s = Math.min(s, 4);
            document.getElementById('sFill').style.width = lvls[s].w;
            document.getElementById('sFill').style.background = lvls[s].color;
            document.getElementById('sLabel').textContent = lvls[s].text;
            document.getElementById('sLabel').style.color = lvls[s].color;
        });

        /* STEP LOGIC */
        const stepMeta = [{
                label: 'Informations',
                tag: 'Étape 1 sur 2',
                title: 'Tes infos',
                prog: 50
            },
            {
                label: 'Sécurité',
                tag: 'Étape 2 sur 2',
                title: 'Sécurité',
                prog: 100
            }
        ];

        function setErr(id, show) {
            document.getElementById(id)?.classList.toggle('has-error', show);
        }

        function validateStep(n) {
            let ok = true;

            if (n === 1) {
                const p = document.getElementById('prenom').value.trim();
                const nm = document.getElementById('nom').value.trim();
                const ps = document.getElementById('pseudo').value.trim();
                const em = document.getElementById('email').value.trim();

                setErr('f-prenom', !p);
                if (!p) ok = false;
                setErr('f-nom', !nm);
                if (!nm) ok = false;
                setErr('f-pseudo', !ps);
                if (!ps) ok = false;

                const ev = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em);
                setErr('f-email', !ev);
                if (!ev) ok = false;
            }

            if (n === 2) {
                const pw = document.getElementById('password').value;
                const cf = document.getElementById('confirm').value;

                setErr('f-password', pw.length < 8);
                if (pw.length < 8) ok = false;

                const cm = pw === cf && cf !== '';
                setErr('f-confirm', !cm);
                if (!cm) ok = false;
            }

            return ok;
        }

        function updateUI(step) {
            document.querySelectorAll('.step-panel').forEach((p, i) => p.classList.toggle('active', i === step - 1));
            document.querySelectorAll('#leftSteps .step-item').forEach((el, i) => {
                el.classList.remove('active', 'done');
                if (i + 1 === step) el.classList.add('active');
                if (i + 1 < step) el.classList.add('done');
            });
            const m = stepMeta[step - 1];
            document.getElementById('progressFill').style.width = m.prog + '%';
            document.getElementById('progressLabel').textContent = m.label;
            document.getElementById('progressCurrent').textContent = step;
            document.getElementById('formTag').textContent = m.tag;
            document.getElementById('formTitle').textContent = m.title;
        }

        function nextStep(current) {
            if (!validateStep(current)) return;
            updateUI(current + 1);
        }

        function prevStep(current) {
            updateUI(current - 1);
        }

        function submitForm() {
            if (!validateStep(2)) return;

            const pseudo = document.getElementById('pseudo').value || 'SENPAI';

            document.getElementById('successPseudo').textContent =
                pseudo.toUpperCase();

            // Masquer formulaire
            document.getElementById('step2').style.display = 'none';
            document.querySelector('.progress-wrap').style.display = 'none';
            document.querySelector('.form-heading').style.display = 'none';
            document.querySelector('.divider').style.display = 'none';

            // Afficher succès
            document.getElementById('successScreen').classList.add('active');
        }
    </script>
</body>

</html>