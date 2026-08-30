<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MITS — Tempahan Baju</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  @font-face{
    font-family:'Road Rage';
    src:url('{{ asset('images/Road_Rage.otf') }}') format('opentype');
    font-weight:400;
    font-style:normal;
    font-display:swap;
  }
  :root{
    --navy:#154F48;
    --navy-deep:#0F3F3A;
    --paper:#F7F7F7;
    --panel:#FFFFFF;
    --gold:#D4AF37;
    --gold-dark:#A9872A;
    --teal:#154F48;
    --teal-light:#E4EEEC;
    --coral:#B8912B;
    --coral-light:#FBF3DF;
    --ink:#1B2622;
    --ink-soft:#5C6863;
    --line:#DCD9CD;
    --danger:#B84040;
  }
  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    margin:0;
    background-color:var(--paper);
    background-image:
      repeating-linear-gradient(45deg, rgba(21,79,72,0.08) 0, rgba(21,79,72,0.08) 1px, transparent 1px, transparent 22px),
      repeating-linear-gradient(-45deg, rgba(21,79,72,0.08) 0, rgba(21,79,72,0.08) 1px, transparent 1px, transparent 22px);
    color:var(--ink);font-family:'Inter',sans-serif;
  }
  a{color:inherit;}

  /* NAV */
  .nav{
    position:sticky;top:0;z-index:40;background:rgba(246,244,239,0.92);backdrop-filter:blur(6px);
    border-bottom:1px solid var(--line);padding:14px 24px;display:flex;align-items:center;justify-content:space-between;
  }
  .brand{display:flex;align-items:center;gap:clamp(6px,2vw,10px);min-width:0;}
  .brand-mark{width:clamp(28px,7vw,36px);height:clamp(28px,7vw,36px);background:var(--navy);border-radius:9px;display:flex;align-items:center;justify-content:center;font-family:'Space Grotesk',sans-serif;font-weight:700;color:var(--gold);font-size:13px;overflow:hidden;flex-shrink:0;}
  .brand-mark img{width:70%;height:70%;object-fit:contain;}
  .brand-name{font-family:'Road Rage',cursive;font-weight:400;font-size:clamp(14px,4.5vw,26px);color:var(--navy);letter-spacing:.02em;white-space:nowrap;}
  .nav-links{display:flex;gap:22px;align-items:center;}
  .nav-links a{font-size:13.5px;font-weight:600;color:var(--ink-soft);text-decoration:none;}
  @media (max-width:720px){
    .brand{position:absolute;left:50%;transform:translateX(-50%);max-width:calc(100vw - 140px);}
    .nav-links{margin-left:auto;}
  }
  .nav-links a:hover{color:var(--navy);}
  .nav-cta{background:var(--navy);color:#fff;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;}
  .admin-link{font-size:12px;color:var(--ink-soft);text-decoration:underline;cursor:pointer;background:none;border:none;font-family:'Inter',sans-serif;}
  @media (max-width:720px){.nav-links a:not(.admin-link){display:none;}}

  /* HERO */
  .hero{
    max-width:1100px;margin:0 auto;padding:64px 24px 40px;text-align:center;position:relative;overflow:hidden;
  }
  .hero-eyebrow{
    display:inline-flex;align-items:center;gap:6px;background:var(--teal-light);color:var(--teal);
    font-size:12.5px;font-weight:600;padding:6px 14px;border-radius:20px;margin-bottom:20px;
    opacity:0;animation:fadeUp .6s ease forwards;
  }
  .hero h1{
    font-family:'Space Grotesk',sans-serif;font-size:clamp(30px,5vw,50px);font-weight:700;line-height:1.12;
    color:var(--navy);margin:0 0 16px;opacity:0;animation:fadeUp .7s ease .1s forwards;
  }
  .hero h1 em{font-style:normal;color:var(--coral);}
  .hero p{
    font-size:16px;color:var(--ink-soft);max-width:520px;margin:0 auto 28px;line-height:1.6;
    opacity:0;animation:fadeUp .7s ease .2s forwards;
  }
  .hero-ctas{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;opacity:0;animation:fadeUp .7s ease .3s forwards;}
  .btn-primary{background:var(--navy);color:#fff;padding:13px 24px;border-radius:10px;font-weight:600;font-size:14.5px;text-decoration:none;border:none;cursor:pointer;font-family:'Inter',sans-serif;transition:transform .15s ease,background .15s ease;}
  .btn-primary:hover{background:var(--navy-deep);transform:translateY(-2px);}
  .btn-ghost{background:transparent;color:var(--navy);padding:13px 24px;border-radius:10px;font-weight:600;font-size:14.5px;text-decoration:none;border:1.5px solid var(--line);cursor:pointer;font-family:'Inter',sans-serif;transition:border-color .15s ease,transform .15s ease;}
  .btn-ghost:hover{border-color:var(--navy);transform:translateY(-2px);}
  @keyframes fadeUp{from{opacity:0;transform:translateY(14px);}to{opacity:1;transform:translateY(0);}}

  .float-tag{
    position:absolute;background:var(--panel);border:1px solid var(--line);border-radius:12px;
    padding:10px 14px;font-family:'IBM Plex Mono',monospace;font-size:12px;box-shadow:0 6px 18px rgba(22,35,63,0.08);
    animation:float 4s ease-in-out infinite;
  }
  .float-tag .l{font-family:'Inter',sans-serif;font-size:10.5px;color:var(--ink-soft);text-transform:uppercase;letter-spacing:.04em;}
  .float-tag .v{font-weight:600;color:var(--navy);font-size:14px;}
  .tag-a{top:20px;left:6%;animation-delay:0s;}
  .tag-b{top:70px;right:5%;animation-delay:1.3s;}
  @keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-10px);}}
  @media (max-width:720px){.float-tag{display:none;}}

  /* REVEAL sections */
  .reveal{opacity:0;transform:translateY(24px);transition:opacity .6s ease,transform .6s ease;}
  .reveal.visible{opacity:1;transform:translateY(0);}

  section{max-width:1100px;margin:0 auto;padding:60px 24px;}
  .section-head{text-align:center;margin-bottom:36px;}
  .eyebrow{font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--gold-dark);margin-bottom:8px;}
  .section-head h2{font-family:'Space Grotesk',sans-serif;font-size:28px;color:var(--navy);margin:0 0 10px;}
  .section-head p{color:var(--ink-soft);font-size:14.5px;max-width:480px;margin:0 auto;}

  /* POSTERS */
  .posters{display:grid;grid-template-columns:1fr 1fr;gap:24px;}
  @media (max-width:720px){.posters{grid-template-columns:1fr;}}
  .poster-card{
    background:var(--panel);border:1px solid var(--line);border-radius:18px;overflow:hidden;
    transition:transform .25s ease,box-shadow .25s ease;
  }
  .poster-card:hover{transform:translateY(-6px);box-shadow:0 16px 30px rgba(22,35,63,0.1);}
  .poster-art{
    height:340px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;
  }
  .poster-art.laki{background:linear-gradient(180deg,#DCEAE7 0%,#F0F5F3 100%);}
  .poster-art.muslimah{background:linear-gradient(180deg,var(--coral-light) 0%,#FCF9EE 100%);}
  .poster-art svg{width:150px;height:220px;filter:drop-shadow(0 8px 14px rgba(22,35,63,0.12));}
  .poster-art img{width:100%;height:100%;object-fit:cover;object-position:center;}
  .main-poster-wrap{max-width:640px;margin:0 auto;border-radius:18px;overflow:hidden;border:1px solid var(--line);box-shadow:0 10px 30px rgba(22,35,63,0.12);}
  .main-poster-img{width:100%;display:block;}
  .poster-badge{
    position:absolute;top:16px;right:16px;background:var(--navy);color:#fff;font-size:11px;font-weight:600;
    padding:5px 11px;border-radius:20px;
  }
  .poster-body{padding:22px 24px 24px;}
  .poster-body h3{font-family:'Space Grotesk',sans-serif;font-size:19px;color:var(--navy);margin:0 0 4px;}
  .poster-body .sub{font-size:13px;color:var(--ink-soft);margin-bottom:16px;}
  .price-tiers{display:flex;gap:8px;margin-bottom:18px;}
  .tier{flex:1;text-align:center;border:1px solid var(--line);border-radius:10px;padding:10px 6px;}
  .tier .qn{font-size:11px;color:var(--ink-soft);font-weight:600;}
  .tier .pv{font-family:'IBM Plex Mono',monospace;font-weight:600;color:var(--navy);font-size:15px;margin-top:2px;}
  .tier.best{border-color:var(--gold);background:#F5EFD8;}
  .poster-cta{
    width:100%;background:var(--navy);color:#fff;border:none;border-radius:9px;padding:11px;
    font-weight:600;font-size:13.5px;cursor:pointer;font-family:'Inter',sans-serif;transition:background .15s ease;
  }
  .poster-cta:hover{background:var(--navy-deep);}

  /* SIZE CHART */
  .size-wrap{background:var(--panel);border:1px solid var(--line);border-radius:16px;padding:8px;overflow-x:auto;}

  .size-gender-tabs{display:flex;gap:10px;justify-content:center;margin-bottom:24px;}
  .sgt-btn{
    background:var(--panel);border:1.5px solid var(--line);border-radius:10px;padding:10px 22px;
    font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:14px;color:var(--ink-soft);cursor:pointer;
    transition:all .15s ease;
  }
  .sgt-btn:hover{border-color:var(--navy);}
  .sgt-btn.active{background:var(--navy);color:#fff;border-color:var(--navy);}
  .size-chart-card{
    max-width:520px;margin:0 auto;border-radius:18px;overflow:hidden;border:1px solid var(--line);
    box-shadow:0 10px 30px rgba(22,35,63,0.12);
  }
  .size-chart-img{width:100%;display:block;}
  table.size-table{width:100%;border-collapse:collapse;min-width:520px;}
  table.size-table th{
    background:var(--navy);color:#fff;font-size:12px;font-weight:600;padding:12px 14px;text-align:left;
  }
  table.size-table th:first-child{border-top-left-radius:10px;}
  table.size-table th:last-child{border-top-right-radius:10px;}
  table.size-table td{padding:11px 14px;font-size:13.5px;border-bottom:1px solid var(--line);}
  table.size-table tr:last-child td{border-bottom:none;}
  table.size-table tr:hover td{background:#F4F7F5;}
  .size-note{
    display:flex;gap:10px;align-items:flex-start;background:var(--teal-light);color:var(--teal);
    padding:14px 16px;border-radius:10px;margin-top:16px;font-size:13px;line-height:1.5;
  }
  .payment-note{
    display:flex;gap:10px;align-items:flex-start;background:var(--coral-light);color:#6B5416;
    padding:12px 14px;border-radius:10px;margin-top:12px;font-size:12.5px;line-height:1.5;
  }

  /* FORM */
  .grid{display:grid;grid-template-columns:1.35fr 1fr;gap:24px;align-items:start;}
  @media (max-width:760px){.grid{grid-template-columns:1fr;}}
  .card{background:var(--panel);border:1px solid var(--line);border-radius:14px;padding:24px;}
  .card h3.formh{font-family:'Space Grotesk',sans-serif;font-size:16px;margin:0 0 18px;color:var(--navy);display:flex;align-items:center;gap:8px;}
  .card h3.formh .num{width:22px;height:22px;border-radius:50%;background:var(--teal-light);color:var(--teal);font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
  label{display:block;font-size:12.5px;font-weight:600;color:var(--ink-soft);margin:0 0 6px;}
  .field{margin-bottom:16px;}
  input[type=text],input[type=tel],input[type=number],textarea,select{
    width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:8px;font-family:'Inter',sans-serif;
    font-size:14px;color:var(--ink);background:#F4F7F5;
  }
  select{appearance:none;-webkit-appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%235C6863' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:32px;cursor:pointer;}
  input:focus,textarea:focus,select:focus{outline:none;border-color:var(--navy);background-color:#fff;}
  textarea{resize:vertical;min-height:60px;}
  .row2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
  .qty-block{display:flex;align-items:center;justify-content:space-between;border:1px solid var(--line);border-radius:10px;padding:12px 14px;margin-bottom:10px;background:#F4F7F5;transition:border-color .2s ease;}
  .qty-block.pulse{border-color:var(--gold);}
  .qty-block .lbl{font-size:13.5px;font-weight:600;color:var(--navy);}
  .qty-block .lbl span{display:block;font-size:11.5px;font-weight:400;color:var(--ink-soft);margin-top:1px;}
  .stepper{display:flex;align-items:center;gap:8px;}
  .stepper button{width:28px;height:28px;border-radius:7px;border:1px solid var(--line);background:#fff;font-size:16px;line-height:1;cursor:pointer;color:var(--navy);font-weight:600;}
  .stepper button:active{transform:scale(0.94);}
  .stepper input{width:46px;text-align:center;padding:6px 4px;font-family:'IBM Plex Mono',monospace;font-weight:600;}
  .submit-btn{width:100%;background:var(--navy);color:#fff;border:none;border-radius:10px;padding:13px;font-family:'Space Grotesk',sans-serif;font-size:14.5px;font-weight:600;cursor:pointer;margin-top:6px;}
  .submit-btn:hover{background:var(--navy-deep);}
  .submit-btn:disabled{background:#B4B2A9;cursor:not-allowed;}
  .err{color:var(--danger);font-size:12.5px;margin-top:4px;display:none;}
  .receipt{background:var(--panel);border:1px solid var(--line);border-radius:14px;position:sticky;top:74px;overflow:hidden;}
  .receipt-head{background:var(--navy);color:#fff;padding:18px 22px;font-family:'Space Grotesk',sans-serif;}
  .receipt-head .tag{font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:var(--gold);font-weight:600;}
  .receipt-head .title{font-size:17px;font-weight:700;margin-top:4px;}
  .receipt-body{padding:20px 22px;font-family:'IBM Plex Mono',monospace;font-size:13px;}
  .rline{display:flex;justify-content:space-between;padding:6px 0;color:var(--ink);}
  .rline .sub{color:var(--ink-soft);font-size:11.5px;}
  .rdash{border-top:1px dashed var(--line);margin:10px 0;}
  .rtotal{display:flex;justify-content:space-between;padding:10px 0 2px;font-weight:600;font-size:16px;color:var(--navy);}
  .rnote{background:var(--teal-light);color:var(--teal);border-radius:8px;padding:10px 12px;font-family:'Inter',sans-serif;font-size:12px;margin-top:14px;line-height:1.5;}
  .empty-hint{font-family:'Inter',sans-serif;color:var(--ink-soft);font-size:13px;text-align:center;padding:20px 0;}
  .perf{height:14px;background:radial-gradient(circle at 10px 0, transparent 7px, var(--paper) 7.5px) top/20px 14px repeat-x;}

  /* MOTIVATION BANNER */
  .motivate-card{
    max-width:720px;margin:0 auto;text-align:center;background:linear-gradient(135deg,var(--navy) 0%,var(--navy-deep) 100%);
    color:#fff;border-radius:18px;padding:40px 32px;box-shadow:0 16px 34px rgba(15,63,58,0.22);
  }
  .motivate-card .mc-icon{font-size:30px;margin-bottom:10px;}
  .motivate-card h2{font-family:'Space Grotesk',sans-serif;font-size:24px;margin:0 0 12px;color:#fff;}
  .motivate-card h2 em{font-style:normal;color:var(--gold);}
  .motivate-card p{font-size:14.5px;line-height:1.7;color:#E4EEEC;max-width:520px;margin:0 auto 22px;}
  .motivate-card .btn-primary{background:var(--gold);color:#2E2408;}
  .motivate-card .btn-primary:hover{background:var(--gold-dark);}

  .toast{position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(120%);background:var(--navy);color:#fff;padding:13px 22px;border-radius:10px;font-family:'Inter',sans-serif;font-size:14px;font-weight:500;transition:transform .25s ease;z-index:50;display:flex;align-items:center;gap:10px;}

  .whatsapp-fab{
    position:fixed;bottom:24px;right:24px;width:56px;height:56px;border-radius:50%;
    background:#25D366;display:flex;align-items:center;justify-content:center;
    box-shadow:0 8px 20px rgba(37,211,102,0.45);z-index:45;transition:transform .15s ease;
  }
  .whatsapp-fab:hover{transform:scale(1.08);}
  .whatsapp-fab svg{width:28px;height:28px;fill:#fff;}
  @media (max-width:480px){.whatsapp-fab{width:50px;height:50px;bottom:18px;right:18px;}}
  .toast.show{transform:translateX(-50%) translateY(0);}
  .toast .dot{width:8px;height:8px;border-radius:50%;background:var(--gold);}

  #adminSection{display:none;}
  .admin-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:12px;margin-bottom:20px;}
  .stat{background:var(--panel);border:1px solid var(--line);border-radius:12px;padding:14px 16px;}
  .stat .l{font-size:11.5px;color:var(--ink-soft);font-weight:600;text-transform:uppercase;letter-spacing:.04em;}
  .stat .v{font-family:'Space Grotesk',sans-serif;font-size:21px;font-weight:700;color:var(--navy);margin-top:4px;}
  table.admin-table{width:100%;border-collapse:collapse;font-size:13px;}
  table.admin-table th{text-align:left;font-size:11px;text-transform:uppercase;letter-spacing:.04em;color:var(--ink-soft);padding:8px 10px;border-bottom:2px solid var(--line);white-space:nowrap;}
  table.admin-table td{padding:9px 10px;border-bottom:1px solid var(--line);white-space:nowrap;}
  table.admin-table tr:hover td{background:#F4F7F5;}
  .tblwrap{overflow-x:auto;border:1px solid var(--line);border-radius:12px;background:var(--panel);}
  .pill{background:var(--teal-light);color:var(--teal);border-radius:6px;padding:2px 8px;font-size:11.5px;font-weight:600;}
  .search-row{display:flex;gap:10px;margin-bottom:14px;flex-wrap:wrap;}
  .search-row input{max-width:260px;}
  .refresh-btn{background:none;border:1px solid var(--line);border-radius:8px;padding:8px 12px;font-size:12.5px;font-weight:600;color:var(--navy);cursor:pointer;font-family:'Inter',sans-serif;}

  footer{text-align:center;padding:30px 24px 50px;color:var(--ink-soft);font-size:12.5px;}

  .combo-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(130px,1fr));gap:10px;margin-bottom:8px;}
  @media (max-width:600px){.combo-cards{grid-template-columns:repeat(2,1fr);}}
  .combo-card{
    border:1.5px solid var(--line);border-radius:12px;padding:14px 10px;text-align:center;
    cursor:pointer;background:#fff;transition:border-color .15s ease,background .15s ease,transform .15s ease;
  }
  .combo-card:hover{border-color:var(--navy);transform:translateY(-2px);}
  .combo-card.selected{border-color:var(--navy);background:var(--teal-light);}
  .combo-card .cc-badge{
    display:inline-block;font-size:10px;font-weight:600;background:var(--gold);color:#4A3B12;
    padding:2px 8px;border-radius:10px;margin-bottom:6px;
  }
  .combo-card .cc-title{font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:15px;color:var(--navy);}
  .combo-card .cc-sub{font-size:11px;color:var(--ink-soft);margin-top:3px;}
  .combo-hint{font-size:12.5px;color:var(--ink-soft);margin-bottom:18px;}
  .combo-hint.ok{color:var(--teal);}
  .split-status{
    font-size:12.5px;font-weight:600;padding:9px 12px;border-radius:8px;margin-bottom:16px;
    background:#F4F7F5;border:1px solid var(--line);color:var(--ink-soft);
  }
  .split-status.match{background:var(--teal-light);border-color:var(--teal);color:var(--teal);}
  .split-status.mismatch{background:var(--coral-light);border-color:var(--coral);color:#6B5416;}
  .size-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:6px;margin-top:12px;}
  @media (max-width:600px){.size-grid{grid-template-columns:repeat(3,1fr);}}
  .size-input{display:flex;flex-direction:column;gap:4px;align-items:center;}
  .size-input .sz-label{font-size:11px;font-weight:600;color:var(--navy);}
  .size-input input{width:100%;padding:6px 2px;text-align:center;font-size:13px;}
  .size-status{font-size:11.5px;color:var(--ink-soft);margin-top:8px;font-weight:600;}
  .size-status.match{color:var(--teal);}
  .size-status.mismatch{color:#6B5416;}
  .upgrade-row{margin-top:10px;padding-top:10px;border-top:1px dashed var(--line);}
  .upgrade-row .lbl{font-size:13px;font-weight:600;color:var(--navy);margin-bottom:8px;}
  .upgrade-row .lbl span{display:block;font-size:11px;font-weight:400;color:var(--ink-soft);margin-top:1px;}
  .upgrade-row .size-input input{border-color:var(--gold);}

  .dropzone{
    border:1.5px dashed var(--line);border-radius:10px;padding:20px 16px;text-align:center;
    cursor:pointer;background:#F4F7F5;transition:border-color .15s ease,background .15s ease;
  }
  .dropzone:hover,.dropzone.drag{border-color:var(--navy);background:#EFF6F3;}
  .dropzone .dz-icon{font-size:22px;color:var(--ink-soft);}
  .dropzone .dz-text{font-size:13px;color:var(--ink-soft);margin-top:6px;}
  .dropzone .dz-text strong{color:var(--navy);}
  .receipt-preview{display:none;align-items:center;gap:12px;border:1px solid var(--line);border-radius:10px;padding:10px 12px;background:#F4F7F5;}
  .receipt-preview img{width:52px;height:52px;object-fit:cover;border-radius:7px;border:1px solid var(--line);}
  .receipt-preview .rp-name{font-size:12.5px;font-weight:600;color:var(--navy);word-break:break-all;}
  .receipt-preview .rp-remove{margin-left:auto;background:none;border:none;color:var(--danger);font-size:12.5px;font-weight:600;cursor:pointer;}
  .required-tag{color:var(--coral);}

  .modal-overlay{
    position:fixed;inset:0;background:rgba(14,24,48,0.7);display:none;align-items:center;justify-content:center;
    z-index:100;padding:24px;
  }
  .modal-overlay.show{display:flex;}
  .modal-overlay img{max-width:90vw;max-height:85vh;border-radius:10px;}
  .modal-close{
    position:absolute;top:20px;right:24px;background:#fff;border:none;border-radius:50%;
    width:36px;height:36px;font-size:18px;cursor:pointer;color:var(--navy);
  }
  .receipt-thumb-btn{
    background:none;border:1px solid var(--line);border-radius:7px;padding:4px 10px;font-size:12px;
    font-weight:600;color:var(--navy);cursor:pointer;font-family:'Inter',sans-serif;
  }
</style>
</head>
<body>

<nav class="nav">
  <div class="brand">
    <div class="brand-mark"><img src="{{ asset('images/hxWhite.png') }}" alt="Hendrixx logo"></div>
    <div class="brand-name">Hendrixx Exclusive</div>
  </div>
  <div class="nav-links">
    <a href="#posters">Produk</a>
    <a href="#saiz">Saiz</a>
    <!-- <button class="admin-link" id="tabAdmin">Ejen login</button> -->
  </div>
</nav>

<div id="mainContent">
  
  <div class="hero">
    <div class="float-tag tag-a"><div class="l">Baju laki</div><div class="v">dari RM46/pc</div></div>
    <div class="float-tag tag-b"><div class="l">Baju muslimah</div><div class="v">dari RM51/pc</div></div>
    <div class="hero-eyebrow">MITS 5th Edition 2026</div>
    <h1>Aura Baru,<br>Harga <em>Berbaloi</em> Untuk Setiap Pelajar</h1>
    <p>Tempahan terus melalui ejen . Harga automatik turun bila beli <em>Combo </em></p>
    <div class="hero-ctas">
      <a href="#posters" class="btn-primary">Lihat Produk</a>
      <a href="#order" class="btn-ghost">Terus Tempah</a>
    </div>
  </div>

  <section id="mainposter" class="reveal" style="padding-bottom:0;">
    <div class="section-head">
      <div class="eyebrow">Pre-Order</div>
      <h2>MITS 5th Edition — The Emerald Chapter</h2>
      <p>Poster rasmi projek.</p>
    </div>
    <div class="main-poster-wrap">
      <img src="{{ asset('images/poster-main.jpg') }}" alt="Poster rasmi MITS 5th Edition Emerald Chapter" class="main-poster-img">
    </div>
  </section>

  <section id="posters" class="reveal">
    <div class="section-head">
      <div class="eyebrow">Koleksi</div>
      <h2>Pilih Jenis baju</h2>
      <p>Harga per helai turun automatik ikut kuantiti tempahan.</p>
    </div>
    <div class="posters">

      <div class="poster-card">
        <div class="poster-art laki" style="padding:0;">
          <span class="poster-badge">Banin</span>
          <img src="{{ asset('images/poster-laki.jpg') }}" alt="Baju Banin MITS 5th Edition Emerald Chapter - reka bentuk penuh">
        </div>
        <div class="poster-body">
          <h3>Baju Banin</h3>
          <div class="sub">Design Emerald Prestige — Microfibre Eyelet dan Berkolar</div>
          <div class="price-tiers">
            <div class="tier"><div class="qn">1 pc</div><div class="pv">RM50</div></div>
            <div class="tier"><div class="qn">5 pc</div><div class="pv">RM48</div></div>
            <div class="tier best"><div class="qn">7 pc</div><div class="pv">RM46</div></div>
          </div>
          <button class="poster-cta" data-gender="laki">Tempah Baju</button>
        </div>
      </div>

      <div class="poster-card">
        <div class="poster-art muslimah" style="padding:0;">
          <span class="poster-badge" style="background:var(--gold);color:#4A3B12;">Banat</span>
          <img src="{{ asset('images/poster-muslimah.jpg') }}" alt="Baju Muslimah MITS 5th Edition Emerald Chapter - reka bentuk penuh">
        </div>
        <div class="poster-body">
          <h3>Baju Banat</h3>
          <div class="sub">Design Emerald Prestige — Microfibre Eyelet dan Cutting Muslimah</div>
          <div class="price-tiers">
            <div class="tier"><div class="qn">1 pc</div><div class="pv">RM56</div></div>
            <div class="tier"><div class="qn">5 pc</div><div class="pv">RM54</div></div>
            <div class="tier best"><div class="qn">7 pc</div><div class="pv">RM51</div></div>
          </div>
          <button class="poster-cta" data-gender="muslimah">Tempah Baju</button>
        </div>
      </div>

    </div>
  </section>

  <section id="saiz" class="reveal">
    <div class="section-head">
      <div class="eyebrow">Panduan</div>
      <h2>Carta Saiz</h2>
      <p>Ukuran rasmi (inci) — sila rujuk sebelum tempah.</p>
    </div>

    <div class="size-gender-tabs">
      <button class="sgt-btn active" data-gender="laki">Size Chart Banin</button>
      <button class="sgt-btn" data-gender="muslimah">Size Chart Banat</button>
    </div>

    <div class="size-chart-card" id="sizeChartLaki">
      <img src="{{ asset('images/size-chart-laki.jpg') }}" alt="Size Chart Baju Laki" class="size-chart-img">
    </div>

    <div class="size-chart-card" id="sizeChartMuslimah" style="display:none;">
      <img src="{{ asset('images/size-chart-muslimah.jpg') }}" alt="Size Chart Baju Muslimah" class="size-chart-img">
    </div>
  </section>

  <section id="order" class="reveal">
    <div class="section-head">
      <div class="eyebrow">Langkah akhir</div>
      <h2>Submit Order</h2>
      <p>Isi maklumat pelanggan dan kuantiti mengikut saiz.Double Check size dan harga</p>
    </div>
    <div class="grid">
      <div class="card">
        <h3 class="formh"><span class="num">1</span>Maklumat Ejen &amp; Pelanggan</h3>
        <div class="field">
          <label>Nama ejen *</label>
          <select id="agentName">
            <option value="">Memuatkan senarai ejen...</option>
          </select>
        </div>
        <div class="field">
          <label>Sekolah *</label>
          <select id="schoolName">
            <option value="">Pilih sekolah</option>
            <option value="Mits Istana Bandar">Mits Istana Bandar</option>
            <option value="Mits Alam Impian">Mits Alam Impian</option>
            <option value="Mits Pandan Indah">Mits Pandan Indah</option>
            <option value="Mits Sabak Bernam">Mits Sabak Bernam</option>
            <option value="Mits Sepang">Mits Sepang</option>
          </select>
        </div>
        <div class="row2">
          <div class="field">
            <label>Nama pelanggan <span class="required-tag">*</span></label>
            <input type="text" id="custName" placeholder="Nama pelanggan">
          </div>
          <div class="field">
            <label>No. telefon</label>
            <input type="tel" id="custPhone" placeholder="01X-XXXXXXX">
          </div>
        </div>
        <div class="field">
          <label>Alamat penghantaran</label>
          <textarea id="custAddr" placeholder="Alamat penuh untuk posting"></textarea>
        </div>

        <h3 class="formh" style="margin-top:22px;"><span class="num">2</span>Pilih Combo</h3>
        <div class="combo-cards" id="comboCards">
          @if(\Carbon\Carbon::now('Asia/Kuala_Lumpur')->lte(\Carbon\Carbon::parse('2026-09-05 23:59:59', 'Asia/Kuala_Lumpur')))
          <div class="combo-card" data-type="earlybird" data-target="1">
            <div class="cc-badge">Early Bird</div>
            <div class="cc-title">1 Helai (Early Bird)</div>
            <div class="cc-sub">Banin RM46 · banat RM52 · Sehingga 5 Sept</div>
          </div>
          @endif
          <div class="combo-card" data-type="fixed" data-target="1">
            <div class="cc-badge" style="visibility:hidden;">·</div>
            <div class="cc-title">1 Helai</div>
            <div class="cc-sub">Banin RM50 · banat RM56</div>
          </div>
          <div class="combo-card" data-type="fixed" data-target="5">
            <div class="cc-badge">Popular</div>
            <div class="cc-title">5 Helai</div>
            <div class="cc-sub">Banin RM48 · banat RM54</div>
          </div>
          <div class="combo-card" data-type="fixed" data-target="7">
            <div class="cc-badge">Jimat maksimum</div>
            <div class="cc-title">7 Helai</div>
            <div class="cc-sub">Banin RM46 · banat RM51</div>
          </div>
        </div>
        <div class="combo-hint" id="comboHint">Sila pilih combo di atas dahulu sebelum tetapkan kuantiti.</div>

        <h3 class="formh" style="margin-top:22px;"><span class="num">3</span>Bahagikan Kuantiti</h3>
        <div class="qty-block" id="blockLaki" style="flex-direction:column;align-items:stretch;">
          <div style="display:flex;align-items:center;justify-content:space-between;">
            <div class="lbl">Baju Banin<span id="rateLakiLabel">Pilih combo dahulu</span></div>
            <div class="stepper" style="justify-content:flex-end;">
              <button type="button" data-target="qtyLaki" data-step="-1" disabled>−</button>
              <input type="number" id="qtyLaki" value="0" min="0" disabled>
              <button type="button" data-target="qtyLaki" data-step="1" disabled>+</button>
            </div>
          </div>
          <div class="size-grid" id="sizeGridLaki"></div>
          <div class="size-status" id="sizeStatusLaki"></div>
          <div class="upgrade-row" style="flex-direction:column;align-items:stretch;">
            <div class="lbl">Naik taraf Lycra Premium (ikut saiz)<span>+RM10 / helai — had ikut kuantiti saiz di atas</span></div>
            <div class="size-grid" id="lycraGridLaki"></div>
            <div class="size-status" id="lycraStatusLaki"></div>
          </div>
        </div>
        <div class="qty-block" id="blockMuslimah" style="flex-direction:column;align-items:stretch;">
          <div style="display:flex;align-items:center;justify-content:space-between;">
            <div class="lbl">Baju Banat<span id="rateMuslimahLabel">Pilih combo dahulu</span></div>
            <div class="stepper" style="justify-content:flex-end;">
              <button type="button" data-target="qtyMuslimah" data-step="-1" disabled>−</button>
              <input type="number" id="qtyMuslimah" value="0" min="0" disabled>
              <button type="button" data-target="qtyMuslimah" data-step="1" disabled>+</button>
            </div>
          </div>
          <div class="size-grid" id="sizeGridMuslimah"></div>
          <div class="size-status" id="sizeStatusMuslimah"></div>
          <div class="upgrade-row" style="flex-direction:column;align-items:stretch;">
            <div class="lbl">Naik taraf Lycra Premium (ikut saiz)<span>+RM10 / helai — had ikut kuantiti saiz di atas</span></div>
            <div class="size-grid" id="lycraGridMuslimah"></div>
            <div class="size-status" id="lycraStatusMuslimah"></div>
          </div>
        </div>
        <div class="split-status" id="splitStatus"></div>

        <div class="field" style="margin-top:6px;">
          <label>Catatan (saiz, warna, dll)</label>
          <textarea id="orderNotes" placeholder="Contoh: 2x saiz M, 1x saiz L"></textarea>
        </div>

        <h3 class="formh"><span class="num">4</span>Bukti Pembayaran <span class="required-tag">*</span></h3>
        <div class="field">
          <input type="file" id="receiptFile" accept="image/*,.pdf" style="display:none;">
          <div class="dropzone" id="dropzone">
            <div class="dz-icon">⬆</div>
            <div class="dz-text"><strong>Klik untuk upload</strong> resit / bukti bayaran<br>JPG, PNG atau PDF — maksimum 3MB</div>
          </div>
          <div class="receipt-preview" id="receiptPreview">
            <img id="receiptImg" src="" alt="">
            <span class="rp-name" id="receiptName"></span>
            <button type="button" class="rp-remove" id="receiptRemove">Buang</button>
          </div>
          <div class="payment-note">
            <span>⚠</span>
            <span>Pastikan semak bilangan &amp; harga betul di ringkasan bawah. Sebarang kiraan order total yang salah akan diabaikan.</span>
          </div>
        </div>

        <button class="submit-btn" id="submitBtn">Hantar Pesanan</button>
        <div class="err" id="formErr"></div>
      </div>

      <div class="receipt">
        <div class="receipt-head">
          <div class="tag">Ringkasan</div>
          <div class="title">Anggaran Pesanan</div>
        </div>
        <div class="receipt-body" id="receiptBody">
          <div class="empty-hint">Masukkan kuantiti untuk lihat harga</div>
        </div>
        <div class="perf"></div>
      </div>
    </div>
  </section>

  <section id="motivasi" class="reveal" style="padding-top:0;">
    <div class="motivate-card">
      <div class="mc-icon">🌟</div>
      <h2>Terima kasih, <em>Ejen Hebat</em>!</h2>
      <p>Setiap tempahan yang anda hantar membantu mereka menjadi lebih bergaya dengan baju MITS dan menambah komisen anda sendiri. Jangan berhenti, teruskan semangat untuk hantar lebih lagi!</p>
      <a href="#order" class="btn-primary">Hantar Tempahan Seterusnya</a>
    </div>
  </section>

  <footer>MITS 5th Edition — The Emerald Chapter</footer>
</div>

<div id="adminSection">
  <section style="padding-top:40px;">
    <div class="section-head" style="text-align:left;max-width:none;">
      <h2 style="margin-bottom:4px;">List All order MITS 2026</h2>
      <p style="margin:0;">Tempahan dari semua ejen</p>
    </div>
    <div class="admin-stats" id="adminStats"></div>
    <div class="search-row">
      <input type="text" id="searchAgent" placeholder="Search By Agent...">
      <select id="filterSchool">
        <option value="">Semua sekolah</option>
        <option value="Mits Istana Bandar">Mits Istana Bandar</option>
        <option value="Mits Alam Impian">Mits Alam Impian</option>
        <option value="Mits Pandan Indah">Mits Pandan Indah</option>
        <option value="Mits Sabak Bernam">Mits Sabak Bernam</option>
        <option value="Mits Sepang">Mits Sepang</option>
      </select>
      <button class="refresh-btn" id="refreshBtn">↻ Reload Data</button>
      <button class="refresh-btn" id="backBtn">← Back to landing page</button>
    </div>
    <div class="tblwrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Tarikh</th><th>Ejen</th><th>Sekolah</th><th>Pelanggan</th><th>Telefon</th>
            <th>Combo</th><th>Banin</th><th>Banat</th><th>Lycra Banin</th><th>Lycra Banat</th><th>Jumlah</th><th>Komisen</th><th>Catatan</th><th>Resit</th>
          </tr>
        </thead>
        <tbody id="ordersTbody"></tbody>
      </table>
    </div>

    <div class="section-head" style="text-align:left;max-width:none;margin-top:44px;">
      <h2 style="margin-bottom:4px;">Pecahan Mengikut Sekolah</h2>
      <p style="margin:0;">Jumlah helaian &amp; jualan setiap sekolah.</p>
    </div>
    <div class="tblwrap" style="margin-top:20px;">
      <table class="admin-table" id="schoolSummaryTable">
        <thead><tr><th>Sekolah</th><th>Banin(pcs)</th><th>Banat(pcs)</th><th>Jumlah helaian</th><th>Jumlah jualan</th></tr></thead>
        <tbody></tbody>
      </table>
    </div>

    <div class="section-head" style="text-align:left;max-width:none;margin-top:44px;">
      <h2 style="margin-bottom:4px;">Kesimpulan Mengikut Saiz</h2>
      <p style="margin:0;">Jumlah keseluruhan setiap saiz.</p>
    </div>
    <div class="posters" style="grid-template-columns:1fr 1fr;margin-top:20px;">
      <div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:15px;color:var(--navy);margin:0 0 10px;">Baju Banin</h3>
        <div class="tblwrap">
          <table class="admin-table" id="sizeSummaryLakiTable">
            <thead><tr><th>Saiz</th><th>Jumlah helai</th><th>Lycra</th></tr></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
      <div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:15px;color:var(--navy);margin:0 0 10px;">Baju Banat</h3>
        <div class="tblwrap">
          <table class="admin-table" id="sizeSummaryMuslimahTable">
            <thead><tr><th>Saiz</th><th>Jumlah helai</th><th>Lycra</th></tr></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<a class="whatsapp-fab" href="https://wa.me/60182669051?text=Hai%2C%20saya%20ejen%20MITS%2C%20ada%20masalah%20dengan%20tempahan." target="_blank" rel="noopener" aria-label="WhatsApp bantuan ejen">
  <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
</a>

<div class="toast" id="toast"><span class="dot"></span><span id="toastMsg">Pesanan dihantar</span></div>

<script>
const SHEETS_WEBAPP_URL = 'https://script.google.com/macros/s/AKfycbwR44uCj-lCYhg10sty97MkZwjekE2II5dbQt4LFrbCWJlgtHPGqRlyhwcgZOHs0u6a/exec';
const RATE_EJEN = 4.5;
const COST_LAKI = 27.5;
const COST_MUSLIMAH = 32.5;
const RATE_TABLE = {
  1: {laki:50, muslimah:56},
  5: {laki:48, muslimah:54},
  7: {laki:46, muslimah:51}
};
const EARLYBIRD_RATE = {laki:46, muslimah:52};
const LYCRA_SURCHARGE = 10;
function ratesForCombo(sum){
  if(selectedCombo && selectedCombo.type === 'earlybird'){
    return EARLYBIRD_RATE;
  }
  return RATE_TABLE[tierForTotal(sum)] || {laki:0, muslimah:0};
}
const SIZES = ['XS','S','M','L','XL','XXL'];
function tierForTotal(total){ if(total>=7) return 7; if(total>=5) return 5; if(total>=1) return 1; return 0; }

function buildSizeGrid(containerId, prefix){
  const container = document.getElementById(containerId);
  container.innerHTML = SIZES.map(sz => `
    <div class="size-input">
      <span class="sz-label">${sz}</span>
      <input type="number" min="0" value="0" data-size="${sz}" id="${prefix}_${sz}" disabled>
    </div>
  `).join('');
  container.querySelectorAll('input').forEach(inp=>{
    inp.addEventListener('input', ()=>{
      if(inp.value === '') return;
      let val = Math.max(0, parseInt(inp.value,10) || 0);
      val = Math.min(val, sizeRemaining(prefix, inp.dataset.size));
      inp.value = val;
      clampLycraForSize(prefix, inp.dataset.size);
      updateSplitAndReceipt();
    });
  });
}
buildSizeGrid('sizeGridLaki', 'szL');
buildSizeGrid('sizeGridMuslimah', 'szM');

function lycraMaxForSize(sizePrefix, sz){
  const el = document.getElementById(sizePrefix + '_' + sz);
  return el ? (parseInt(el.value,10) || 0) : 0;
}
function clampLycraForSize(sizePrefix, sz){
  const lycPrefix = sizePrefix === 'szL' ? 'lycL' : 'lycM';
  const lycEl = document.getElementById(lycPrefix + '_' + sz);
  if(!lycEl) return;
  const maxVal = lycraMaxForSize(sizePrefix, sz);
  if((parseInt(lycEl.value,10) || 0) > maxVal) lycEl.value = maxVal;
}
function clampAllLycra(){
  SIZES.forEach(sz=>{
    clampLycraForSize('szL', sz);
    clampLycraForSize('szM', sz);
  });
}
function buildLycraGrid(containerId, lycraPrefix, sizePrefix){
  const container = document.getElementById(containerId);
  container.innerHTML = SIZES.map(sz => `
    <div class="size-input">
      <span class="sz-label">${sz}</span>
      <input type="number" min="0" value="0" data-size="${sz}" id="${lycraPrefix}_${sz}" disabled>
    </div>
  `).join('');
  container.querySelectorAll('input').forEach(inp=>{
    inp.addEventListener('input', ()=>{
      if(inp.value === '') return;
      let val = Math.max(0, parseInt(inp.value,10) || 0);
      val = Math.min(val, lycraMaxForSize(sizePrefix, inp.dataset.size));
      inp.value = val;
      updateSplitAndReceipt();
    });
  });
}
buildLycraGrid('lycraGridLaki', 'lycL', 'szL');
buildLycraGrid('lycraGridMuslimah', 'lycM', 'szM');

function getSizeCounts(prefix){
  const counts = {};
  SIZES.forEach(sz=>{
    const el = document.getElementById(prefix + '_' + sz);
    counts[sz] = el ? (parseInt(el.value,10) || 0) : 0;
  });
  return counts;
}
function getSizeSum(prefix){
  return Object.values(getSizeCounts(prefix)).reduce((a,b)=>a+b,0);
}
function sizeRemaining(prefix, excludeSize){
  const qtyEl = prefix === 'szL' ? qtyLakiEl : qtyMuslimahEl;
  const qty = parseInt(qtyEl.value,10) || 0;
  const counts = getSizeCounts(prefix);
  let usedByOthers = 0;
  SIZES.forEach(sz=>{ if(sz !== excludeSize) usedByOthers += counts[sz]; });
  return Math.max(0, qty - usedByOthers);
}
function setSizeInputsEnabled(prefix, enabled){
  SIZES.forEach(sz=>{
    const el = document.getElementById(prefix + '_' + sz);
    if(el) el.disabled = !enabled;
  });
}

const qtyLakiEl = document.getElementById('qtyLaki');
const qtyMuslimahEl = document.getElementById('qtyMuslimah');
const receiptBody = document.getElementById('receiptBody');
const comboHint = document.getElementById('comboHint');
const splitStatus = document.getElementById('splitStatus');
const rateLakiLabel = document.getElementById('rateLakiLabel');
const rateMuslimahLabel = document.getElementById('rateMuslimahLabel');
const lycraStatusLaki = document.getElementById('lycraStatusLaki');
const lycraStatusMuslimah = document.getElementById('lycraStatusMuslimah');
const sizeStatusLaki = document.getElementById('sizeStatusLaki');
const sizeStatusMuslimah = document.getElementById('sizeStatusMuslimah');

let selectedCombo = null;

function setQtyControlsEnabled(enabled){
  document.querySelectorAll('#blockLaki .stepper button, #blockLaki .stepper input, #blockMuslimah .stepper button, #blockMuslimah .stepper input').forEach(el=>{
    el.disabled = !enabled;
  });
  setSizeInputsEnabled('szL', enabled);
  setSizeInputsEnabled('szM', enabled);
  setSizeInputsEnabled('lycL', enabled);
  setSizeInputsEnabled('lycM', enabled);
}

document.querySelectorAll('.combo-card').forEach(card=>{
  card.addEventListener('click', ()=>{
    document.querySelectorAll('.combo-card').forEach(c=>c.classList.remove('selected'));
    card.classList.add('selected');
    const type = card.dataset.type;
    const target = parseInt(card.dataset.target,10);
    selectedCombo = { type, target: (type === 'fixed' || type === 'earlybird') ? target : null };
    setQtyControlsEnabled(true);
    if(type === 'earlybird'){
      comboHint.textContent = 'Combo Early Bird dipilih — 1 helai sahaja. Tawaran sah sehingga 5 September.';
    }else if(type === 'fixed'){
      comboHint.textContent = `Combo ${target} helai dipilih. Bahagikan ${target} helai antara Laki dan Muslimah di bawah.`;
    }else{
      comboHint.textContent = 'Kuantiti sendiri dipilih. Harga akan ikut jumlah keseluruhan yang anda masukkan.';
    }
    comboHint.classList.add('ok');
    updateSplitAndReceipt();
  });
});

function comboRemaining(excludeEl){
  if(!selectedCombo || (selectedCombo.type !== 'fixed' && selectedCombo.type !== 'earlybird')) return Infinity;
  const other = excludeEl === qtyLakiEl
    ? (parseInt(qtyMuslimahEl.value,10) || 0)
    : (parseInt(qtyLakiEl.value,10) || 0);
  return Math.max(0, selectedCombo.target - other);
}

document.querySelectorAll('.stepper button').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    if(btn.disabled) return;
    const target = document.getElementById(btn.dataset.target);
    const step = parseInt(btn.dataset.step,10);
    let val = parseInt(target.value,10) || 0;
    val = Math.max(0, val + step);
    if((target === qtyLakiEl || target === qtyMuslimahEl) && step > 0){
      val = Math.min(val, comboRemaining(target));
    }
    target.value = val;
    updateSplitAndReceipt();
  });
});
[qtyLakiEl, qtyMuslimahEl].forEach(el=>{
  el.addEventListener('input', ()=>{
    if(el.value === '') return;
    let val = Math.max(0, parseInt(el.value,10) || 0);
    val = Math.min(val, comboRemaining(el));
    el.value = val;
    updateSplitAndReceipt();
  });
});

function fmt(n){ return 'RM' + n.toLocaleString('en-MY', {minimumFractionDigits:2, maximumFractionDigits:2}); }

function computeOrder(){
  const qL = parseInt(qtyLakiEl.value,10) || 0;
  const qM = parseInt(qtyMuslimahEl.value,10) || 0;
  const upgL = Math.min(getSizeSum('lycL'), qL);
  const upgM = Math.min(getSizeSum('lycM'), qM);
  const sum = qL + qM;
  const tier = tierForTotal(sum);
  const rates = ratesForCombo(sum);
  const subL = qL * rates.laki + upgL * LYCRA_SURCHARGE;
  const subM = qM * rates.muslimah + upgM * LYCRA_SURCHARGE;
  const grandTotal = subL + subM;
  const commission = sum * RATE_EJEN;
  return {qL,qM,upgL,upgM,lycraSurcharge:LYCRA_SURCHARGE,tier,rL:rates.laki,rM:rates.muslimah,subL,subM,total:grandTotal,commission,qtySum:sum};
}

function updateSplitAndReceipt(){
  clampAllLycra();
  const qL = parseInt(qtyLakiEl.value,10) || 0;
  const qM = parseInt(qtyMuslimahEl.value,10) || 0;
  const sum = qL + qM;
  const tier = tierForTotal(sum);
  const isEarlybird = selectedCombo && selectedCombo.type === 'earlybird';
  const rates = ratesForCombo(sum);
  const tierLabel = isEarlybird ? 'Early Bird' : (tier ? `${tier} helai` : null);
  rateLakiLabel.textContent = tierLabel ? `Harga combo ${tierLabel}: ${fmt(rates.laki)}/pc` : 'Pilih combo dahulu';
  rateMuslimahLabel.textContent = tierLabel ? `Harga combo ${tierLabel}: ${fmt(rates.muslimah)}/pc` : 'Pilih combo dahulu';

  if(!selectedCombo){
    splitStatus.className = 'split-status';
    splitStatus.textContent = 'Belum pilih combo.';
  }else if(selectedCombo.type === 'fixed' || selectedCombo.type === 'earlybird'){
    splitStatus.className = 'split-status ' + (sum === selectedCombo.target ? 'match' : 'mismatch');
    splitStatus.textContent = sum === selectedCombo.target
      ? `Sempurna — ${sum} / ${selectedCombo.target} helai dibahagikan.`
      : `Dipilih ${sum} / ${selectedCombo.target} helai. Sila laraskan supaya jumlah tepat ${selectedCombo.target}.`;
  }else{
    splitStatus.className = 'split-status ' + (sum > 0 ? 'match' : '');
    splitStatus.textContent = sum > 0 ? `Jumlah keseluruhan: ${sum} helai (tier harga ${tier} helai).` : 'Masukkan kuantiti Laki / Muslimah.';
  }

  if(selectedCombo){
    document.querySelectorAll('.stepper button[data-step="1"]').forEach(btn=>{
      const t = document.getElementById(btn.dataset.target);
      if(t === qtyLakiEl || t === qtyMuslimahEl){
        btn.disabled = comboRemaining(t) <= 0;
      }
    });
  }

  const sizeSumL = getSizeSum('szL');
  if(qL > 0){
    sizeStatusLaki.className = 'size-status ' + (sizeSumL === qL ? 'match' : 'mismatch');
    sizeStatusLaki.textContent = `Saiz: ${sizeSumL} / ${qL} helai`;
  }else{
    sizeStatusLaki.className = 'size-status';
    sizeStatusLaki.textContent = '';
  }
  const sizeSumM = getSizeSum('szM');
  if(qM > 0){
    sizeStatusMuslimah.className = 'size-status ' + (sizeSumM === qM ? 'match' : 'mismatch');
    sizeStatusMuslimah.textContent = `Saiz: ${sizeSumM} / ${qM} helai`;
  }else{
    sizeStatusMuslimah.className = 'size-status';
    sizeStatusMuslimah.textContent = '';
  }
  ['szL','szM'].forEach(prefix=>{
    SIZES.forEach(sz=>{
      const el = document.getElementById(prefix + '_' + sz);
      if(el) el.max = sizeRemaining(prefix, sz);
    });
  });
  [['szL','lycL'],['szM','lycM']].forEach(([sizePrefix,lycPrefix])=>{
    SIZES.forEach(sz=>{
      const el = document.getElementById(lycPrefix + '_' + sz);
      if(el) el.max = lycraMaxForSize(sizePrefix, sz);
    });
  });

  const lycSumL = getSizeSum('lycL');
  lycraStatusLaki.textContent = lycSumL > 0 ? `Lycra: ${lycSumL} / ${qL} helai dinaik taraf` : '';
  const lycSumM = getSizeSum('lycM');
  lycraStatusMuslimah.textContent = lycSumM > 0 ? `Lycra: ${lycSumM} / ${qM} helai dinaik taraf` : '';

  renderReceipt();
}

function renderReceipt(){
  const o = computeOrder();
  if(o.qL === 0 && o.qM === 0){
    receiptBody.innerHTML = '<div class="empty-hint">Pilih combo dan masukkan kuantiti untuk lihat harga</div>';
    return;
  }
  let html = '';
  if(o.qL > 0){
    html += `<div class="rline"><span>Baju Laki x${o.qL}<div class="sub">@ ${fmt(o.rL)} / pc</div></span><span>${fmt(o.qL * o.rL)}</span></div>`;
    if(o.upgL > 0){
      html += `<div class="rline"><span>Naik taraf Lycra Premium x${o.upgL}<div class="sub">@ +${fmt(o.lycraSurcharge)} / pc</div></span><span>${fmt(o.upgL * o.lycraSurcharge)}</span></div>`;
    }
  }
  if(o.qM > 0){
    html += `<div class="rline"><span>Baju Muslimah x${o.qM}<div class="sub">@ ${fmt(o.rM)} / pc</div></span><span>${fmt(o.qM * o.rM)}</span></div>`;
    if(o.upgM > 0){
      html += `<div class="rline"><span>Naik taraf Lycra Premium x${o.upgM}<div class="sub">@ +${fmt(o.lycraSurcharge)} / pc</div></span><span>${fmt(o.upgM * o.lycraSurcharge)}</span></div>`;
    }
  }
  html += '<div class="rdash"></div>';
  html += `<div class="rtotal"><span>Jumlah</span><span>${fmt(o.total)}</span></div>`;
  html += `<div class="rnote">Komisen ejen untuk order ini: <strong>${fmt(o.commission)}</strong></div>`;
  receiptBody.innerHTML = html;
}
updateSplitAndReceipt();

async function loadAgentOptions(){
  const select = document.getElementById('agentName');
  try{
    const res = await fetch(SHEETS_WEBAPP_URL + '?type=agents');
    const data = await res.json();
    if(!data.ok) throw new Error(data.error || 'Gagal muat senarai ejen');
    const agents = data.agents || [];
    select.innerHTML = '<option value="">Pilih ejen</option>' +
      agents.map(name => `<option value="${escapeHtml(name)}">${escapeHtml(name)}</option>`).join('');
  }catch(e){
    select.innerHTML = '<option value="">Gagal muat senarai ejen</option>';
  }
}
loadAgentOptions();

document.querySelectorAll('.poster-cta').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    const gender = btn.dataset.gender;
    document.querySelectorAll('.combo-card').forEach(c=>c.classList.remove('selected'));
    selectedCombo = { type: 'custom', target: null };
    setQtyControlsEnabled(true);
    comboHint.textContent = 'Kuantiti sendiri dipilih. Harga akan ikut jumlah keseluruhan yang anda masukkan.';
    comboHint.classList.add('ok');
    const targetEl = gender === 'laki' ? qtyLakiEl : qtyMuslimahEl;
    const block = document.getElementById(gender === 'laki' ? 'blockLaki' : 'blockMuslimah');
    if(parseInt(targetEl.value,10) === 0){ targetEl.value = 1; }
    updateSplitAndReceipt();
    document.getElementById('order').scrollIntoView({behavior:'smooth', block:'start'});
    block.classList.add('pulse');
    setTimeout(()=>block.classList.remove('pulse'), 1500);
  });
});

const formErr = document.getElementById('formErr');
const submitBtn = document.getElementById('submitBtn');
const toast = document.getElementById('toast');

const MAX_RECEIPT_BYTES = 3 * 1024 * 1024;
const receiptFileInput = document.getElementById('receiptFile');
const dropzone = document.getElementById('dropzone');
const receiptPreview = document.getElementById('receiptPreview');
const receiptImg = document.getElementById('receiptImg');
const receiptName = document.getElementById('receiptName');
let receiptBase64 = null;
let receiptMimeType = null;
let receiptOriginalName = null;

dropzone.addEventListener('click', ()=> receiptFileInput.click());
dropzone.addEventListener('dragover', (e)=>{ e.preventDefault(); dropzone.classList.add('drag'); });
dropzone.addEventListener('dragleave', ()=> dropzone.classList.remove('drag'));
dropzone.addEventListener('drop', (e)=>{
  e.preventDefault();
  dropzone.classList.remove('drag');
  if(e.dataTransfer.files && e.dataTransfer.files[0]) handleReceiptFile(e.dataTransfer.files[0]);
});
receiptFileInput.addEventListener('change', ()=>{
  if(receiptFileInput.files && receiptFileInput.files[0]) handleReceiptFile(receiptFileInput.files[0]);
});

function handleReceiptFile(file){
  formErr.style.display = 'none';
  if(file.size > MAX_RECEIPT_BYTES){
    formErr.textContent = 'Fail terlalu besar. Sila upload fail bawah 3MB.';
    formErr.style.display = 'block';
    return;
  }
  const reader = new FileReader();
  reader.onload = ()=>{
    receiptBase64 = reader.result;
    receiptMimeType = file.type;
    receiptOriginalName = file.name;
    receiptName.textContent = file.name;
    if(file.type.startsWith('image/')){
      receiptImg.src = receiptBase64;
      receiptImg.style.display = 'block';
    }else{
      receiptImg.style.display = 'none';
    }
    dropzone.style.display = 'none';
    receiptPreview.style.display = 'flex';
  };
  reader.readAsDataURL(file);
}

document.getElementById('receiptRemove').addEventListener('click', ()=>{
  receiptBase64 = null;
  receiptMimeType = null;
  receiptOriginalName = null;
  receiptFileInput.value = '';
  receiptPreview.style.display = 'none';
  dropzone.style.display = 'block';
});

function showToast(msg){
  document.getElementById('toastMsg').textContent = msg;
  toast.classList.add('show');
  setTimeout(()=>toast.classList.remove('show'), 2600);
}

submitBtn.addEventListener('click', async ()=>{
  const agentName = document.getElementById('agentName').value.trim();
  const schoolName = document.getElementById('schoolName').value;
  const custName = document.getElementById('custName').value.trim();
  const custPhone = document.getElementById('custPhone').value.trim();
  const custAddr = document.getElementById('custAddr').value.trim();
  const notes = document.getElementById('orderNotes').value.trim();
  const o = computeOrder();

  formErr.style.display = 'none';
  if(!agentName){
    formErr.textContent = 'Sila masukkan nama ejen.';
    formErr.style.display = 'block';
    return;
  }
  if(!schoolName){
    formErr.textContent = 'Sila pilih sekolah.';
    formErr.style.display = 'block';
    document.getElementById('schoolName').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }
  if(!custName){
    formErr.textContent = 'Sila masukkan nama pelanggan.';
    formErr.style.display = 'block';
    document.getElementById('custName').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }
  if(!selectedCombo){
    formErr.textContent = 'Sila pilih combo dahulu.';
    formErr.style.display = 'block';
    document.getElementById('comboCards').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }
  if(o.qL === 0 && o.qM === 0){
    formErr.textContent = 'Sila masukkan sekurang-kurangnya 1 kuantiti baju.';
    formErr.style.display = 'block';
    return;
  }
  if((selectedCombo.type === 'fixed' || selectedCombo.type === 'earlybird') && o.qtySum !== selectedCombo.target){
    formErr.textContent = `Jumlah Laki + Muslimah mesti tepat ${selectedCombo.target} helai untuk combo ini (sekarang ${o.qtySum}).`;
    formErr.style.display = 'block';
    return;
  }
  const sizeLaki = getSizeCounts('szL');
  const sizeMuslimah = getSizeCounts('szM');
  if(o.qL > 0 && getSizeSum('szL') !== o.qL){
    formErr.textContent = `Sila bahagikan saiz Baju Laki supaya jumlah tepat ${o.qL} helai.`;
    formErr.style.display = 'block';
    document.getElementById('sizeGridLaki').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }
  if(o.qM > 0 && getSizeSum('szM') !== o.qM){
    formErr.textContent = `Sila bahagikan saiz Baju Muslimah supaya jumlah tepat ${o.qM} helai.`;
    formErr.style.display = 'block';
    document.getElementById('sizeGridMuslimah').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }
  if(!receiptBase64){
    formErr.textContent = 'Sila upload resit / bukti pembayaran sebelum hantar.';
    formErr.style.display = 'block';
    document.getElementById('dropzone').scrollIntoView({behavior:'smooth', block:'center'});
    return;
  }

  const order = {
    agentName, schoolName, custName, custPhone, custAddr, notes,
    comboType: selectedCombo.type, comboTarget: selectedCombo.target,
    qtyLaki: o.qL, qtyMuslimah: o.qM,
    upgradeQtyLaki: o.upgL, upgradeQtyMuslimah: o.upgM, lycraSurcharge: o.lycraSurcharge,
    lycraSizeLaki: getSizeCounts('lycL'), lycraSizeMuslimah: getSizeCounts('lycM'),
    sizeLaki, sizeMuslimah,
    priceLaki: o.rL, priceMuslimah: o.rM,
    subtotalLaki: o.subL, subtotalMuslimah: o.subM,
    total: o.total, commission: o.commission,
    receiptData: receiptBase64, receiptMimeType, receiptFileName: receiptOriginalName,
    timestamp: Date.now()
  };
  submitBtn.disabled = true;
  submitBtn.textContent = 'Menghantar...';
  try{
    const res = await fetch(SHEETS_WEBAPP_URL, { method: 'POST', body: JSON.stringify(order) });
    const result = await res.json();
    if(!result.ok) throw new Error(result.error || 'Gagal simpan ke Google Sheet');
    showToast('Pesanan dihantar — terima kasih ' + agentName + '!');
    document.getElementById('custName').value = '';
    document.getElementById('custPhone').value = '';
    document.getElementById('custAddr').value = '';
    document.getElementById('orderNotes').value = '';
    qtyLakiEl.value = 0;
    qtyMuslimahEl.value = 0;
    SIZES.forEach(sz=>{
      document.getElementById('szL_' + sz).value = 0;
      document.getElementById('szM_' + sz).value = 0;
      document.getElementById('lycL_' + sz).value = 0;
      document.getElementById('lycM_' + sz).value = 0;
    });
    selectedCombo = null;
    document.querySelectorAll('.combo-card').forEach(c=>c.classList.remove('selected'));
    setQtyControlsEnabled(false);
    comboHint.textContent = 'Sila pilih combo di atas dahulu sebelum tetapkan kuantiti.';
    comboHint.classList.remove('ok');
    updateSplitAndReceipt();
    receiptBase64 = null;
    receiptMimeType = null;
    receiptOriginalName = null;
    receiptFileInput.value = '';
    receiptPreview.style.display = 'none';
    dropzone.style.display = 'block';
  }catch(e){
    formErr.textContent = 'Gagal hantar pesanan. Sila cuba lagi.';
    formErr.style.display = 'block';
  }finally{
    submitBtn.disabled = false;
    submitBtn.textContent = 'Hantar Pesanan';
  }
});

/* admin toggle */
const mainContent = document.getElementById('mainContent');
const adminSection = document.getElementById('adminSection');
const tabAdminBtn = document.getElementById('tabAdmin');
if(tabAdminBtn){
  tabAdminBtn.addEventListener('click', ()=>{
    mainContent.style.display = 'none';
    adminSection.style.display = 'block';
    window.scrollTo(0,0);
    loadOrders();
  });
}
document.getElementById('backBtn').addEventListener('click', ()=>{
  adminSection.style.display = 'none';
  mainContent.style.display = 'block';
  window.scrollTo(0,0);
});

let allOrders = [];
function safeParseJson(str){
  try{ return JSON.parse(str) || {}; }catch(e){ return {}; }
}
function sheetRowToOrder(row){
  return {
    timestamp: row['Timestamp'] ? new Date(row['Timestamp']).getTime() : 0,
    agentName: row['Agent Name'] || '',
    schoolName: row['School'] || '',
    custName: row['Customer Name'] || '',
    custPhone: row['Phone'] || '',
    custAddr: row['Address'] || '',
    comboType: row['Combo Type'] || '',
    comboTarget: row['Combo Target'] || null,
    qtyLaki: Number(row['Qty Laki']) || 0,
    qtyMuslimah: Number(row['Qty Muslimah']) || 0,
    sizeLaki: safeParseJson(row['Size Laki']),
    sizeMuslimah: safeParseJson(row['Size Muslimah']),
    total: Number(row['Total']) || 0,
    commission: Number(row['Commission']) || 0,
    notes: row['Notes'] || '',
    receiptUrl: row['Receipt'] || '',
    upgradeQtyLaki: Number(row['Upgrade Qty Laki (Lycra)']) || 0,
    upgradeQtyMuslimah: Number(row['Upgrade Qty Muslimah (Lycra)']) || 0,
    lycraSizeLaki: safeParseJson(row['Lycra Size Laki']),
    lycraSizeMuslimah: safeParseJson(row['Lycra Size Muslimah']),
  };
}
async function loadOrders(){
  const tbody = document.getElementById('ordersTbody');
  tbody.innerHTML = '<tr><td colspan="14" style="text-align:center;color:var(--ink-soft);">Memuatkan...</td></tr>';
  try{
    const res = await fetch(SHEETS_WEBAPP_URL + '?type=submissions');
    const data = await res.json();
    if(!data.ok) throw new Error(data.error || 'Gagal muatkan pesanan');
    const orders = (data.submissions || []).map(sheetRowToOrder);
    orders.sort((a,b)=> b.timestamp - a.timestamp);
    allOrders = orders;
    renderOrders(allOrders);
    renderStats(allOrders);
    renderSchoolSummary(allOrders);
    renderSizeSummary(allOrders);
  }catch(e){
    tbody.innerHTML = '<tr><td colspan="14" style="text-align:center;color:var(--danger);">Gagal muatkan pesanan.</td></tr>';
  }
}

function renderStats(orders){
  const totalHelaian = orders.reduce((s,o)=>s+o.qtyLaki+o.qtyMuslimah,0);
  const totalSales = orders.reduce((s,o)=>s+o.total,0);
  const totalCommission = orders.reduce((s,o)=>s+o.commission,0);
  const totalCost = orders.reduce((s,o)=>s+(o.qtyLaki*COST_LAKI)+(o.qtyMuslimah*COST_MUSLIMAH),0);
  const totalProfitHx = totalSales - totalCost;
  const totalLycra = orders.reduce((s,o)=>s+(o.upgradeQtyLaki||0)+(o.upgradeQtyMuslimah||0),0);
  document.getElementById('adminStats').innerHTML = `
    <div class="stat"><div class="l">Total helaian</div><div class="v">${totalHelaian}</div></div>
    <div class="stat"><div class="l">Total sales</div><div class="v">${fmt(totalSales)}</div></div>
    <div class="stat"><div class="l">Total profit Hx</div><div class="v">${fmt(totalProfitHx)}</div></div>
    <div class="stat"><div class="l">Total komisen ejen</div><div class="v">${fmt(totalCommission)}</div></div>
    <div class="stat"><div class="l">Total naik taraf Lycra</div><div class="v">${totalLycra} pc</div></div>
  `;
}

function renderSchoolSummary(orders){
  const totals = {};
  orders.forEach(o=>{
    const school = o.schoolName || 'Tiada sekolah';
    if(!totals[school]) totals[school] = { laki: 0, muslimah: 0, sales: 0 };
    totals[school].laki += o.qtyLaki;
    totals[school].muslimah += o.qtyMuslimah;
    totals[school].sales += o.total;
  });
  const schools = Object.keys(totals).sort();
  const body = document.querySelector('#schoolSummaryTable tbody');
  if(schools.length === 0){
    body.innerHTML = '<tr><td colspan="5" style="text-align:center;color:var(--ink-soft);">Tiada data.</td></tr>';
    return;
  }
  const grandLaki = schools.reduce((s,sc)=>s+totals[sc].laki,0);
  const grandMuslimah = schools.reduce((s,sc)=>s+totals[sc].muslimah,0);
  const grandSales = schools.reduce((s,sc)=>s+totals[sc].sales,0);
  body.innerHTML = schools.map(sc=>`<tr><td>${escapeHtml(sc)}</td><td>${totals[sc].laki}</td><td>${totals[sc].muslimah}</td><td>${totals[sc].laki+totals[sc].muslimah}</td><td>${fmt(totals[sc].sales)}</td></tr>`).join('')
    + `<tr style="font-weight:600;"><td>Jumlah</td><td>${grandLaki}</td><td>${grandMuslimah}</td><td>${grandLaki+grandMuslimah}</td><td>${fmt(grandSales)}</td></tr>`;
}

function renderSizeSummary(orders){
  const lakiTotals = {};
  const muslimahTotals = {};
  const lakiLycraTotals = {};
  const muslimahLycraTotals = {};
  SIZES.forEach(sz=>{ lakiTotals[sz] = 0; muslimahTotals[sz] = 0; lakiLycraTotals[sz] = 0; muslimahLycraTotals[sz] = 0; });
  orders.forEach(o=>{
    if(o.sizeLaki){
      SIZES.forEach(sz=>{ lakiTotals[sz] += (o.sizeLaki[sz] || 0); });
    }
    if(o.sizeMuslimah){
      SIZES.forEach(sz=>{ muslimahTotals[sz] += (o.sizeMuslimah[sz] || 0); });
    }
    if(o.lycraSizeLaki){
      SIZES.forEach(sz=>{ lakiLycraTotals[sz] += (o.lycraSizeLaki[sz] || 0); });
    }
    if(o.lycraSizeMuslimah){
      SIZES.forEach(sz=>{ muslimahLycraTotals[sz] += (o.lycraSizeMuslimah[sz] || 0); });
    }
  });
  const lakiGrand = SIZES.reduce((s,sz)=>s+lakiTotals[sz],0);
  const muslimahGrand = SIZES.reduce((s,sz)=>s+muslimahTotals[sz],0);
  const lakiLycraGrand = SIZES.reduce((s,sz)=>s+lakiLycraTotals[sz],0);
  const muslimahLycraGrand = SIZES.reduce((s,sz)=>s+muslimahLycraTotals[sz],0);

  const lakiBody = document.querySelector('#sizeSummaryLakiTable tbody');
  lakiBody.innerHTML = SIZES.map(sz=>`<tr><td>${sz}</td><td>${lakiTotals[sz]}</td><td>${lakiLycraTotals[sz] || '-'}</td></tr>`).join('')
    + `<tr style="font-weight:600;"><td>Jumlah</td><td>${lakiGrand}</td><td>${lakiLycraGrand}</td></tr>`;

  const muslimahBody = document.querySelector('#sizeSummaryMuslimahTable tbody');
  muslimahBody.innerHTML = SIZES.map(sz=>`<tr><td>${sz}</td><td>${muslimahTotals[sz]}</td><td>${muslimahLycraTotals[sz] || '-'}</td></tr>`).join('')
    + `<tr style="font-weight:600;"><td>Jumlah</td><td>${muslimahGrand}</td><td>${muslimahLycraGrand}</td></tr>`;
}

function formatSizeBreakdown(sizeObj){
  if(!sizeObj) return '-';
  const parts = SIZES.filter(sz => (sizeObj[sz] || 0) > 0).map(sz => `${sz}:${sizeObj[sz]}`);
  return parts.length ? parts.join(', ') : '-';
}

function renderOrders(orders){
  const tbody = document.getElementById('ordersTbody');
  if(orders.length === 0){
    tbody.innerHTML = '<tr><td colspan="14" style="text-align:center;color:var(--ink-soft);">Belum ada pesanan.</td></tr>';
    return;
  }
  tbody.innerHTML = orders.map((o)=>{
    const d = new Date(o.timestamp);
    const dateStr = d.toLocaleDateString('en-MY',{day:'2-digit',month:'short'}) + ' ' + d.toLocaleTimeString('en-MY',{hour:'2-digit',minute:'2-digit'});
    const receiptCell = o.receiptUrl
      ? `<a href="${escapeHtml(o.receiptUrl)}" target="_blank" rel="noopener" class="receipt-thumb-btn" style="text-decoration:none;">Lihat</a>`
      : '-';
    const comboLabel = o.comboType === 'fixed' ? `${o.comboTarget} helai`
      : o.comboType === 'earlybird' ? 'Early Bird'
      : o.comboType === 'custom' ? 'Sendiri' : '-';
    return `<tr>
      <td>${dateStr}</td>
      <td><span class="pill">${escapeHtml(o.agentName)}</span></td>
      <td>${escapeHtml(o.schoolName || '-')}</td>
      <td>${escapeHtml(o.custName || '-')}</td>
      <td>${escapeHtml(o.custPhone || '-')}</td>
      <td>${escapeHtml(comboLabel)}</td>
      <td>${o.qtyLaki > 0 ? o.qtyLaki + ' pc' : '-'}</td>
      <td>${o.qtyMuslimah > 0 ? o.qtyMuslimah + ' pc' : '-'}</td>
      <td>${escapeHtml(formatSizeBreakdown(o.lycraSizeLaki))}</td>
      <td>${escapeHtml(formatSizeBreakdown(o.lycraSizeMuslimah))}</td>
      <td>${fmt(o.total)}</td>
      <td>${fmt(o.commission)}</td>
      <td>${escapeHtml(o.notes || '-')}</td>
      <td>${receiptCell}</td>
    </tr>`;
  }).join('');
}

function escapeHtml(str){
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

function applyFilters(){
  const q = document.getElementById('searchAgent').value.trim().toLowerCase();
  const school = document.getElementById('filterSchool').value;
  const filtered = allOrders.filter(o =>
    (!q || o.agentName.toLowerCase().includes(q)) &&
    (!school || o.schoolName === school)
  );
  renderOrders(filtered);
  renderStats(filtered);
  renderSchoolSummary(filtered);
  renderSizeSummary(filtered);
}
document.getElementById('searchAgent').addEventListener('input', applyFilters);
document.getElementById('filterSchool').addEventListener('change', applyFilters);
document.getElementById('refreshBtn').addEventListener('click', loadOrders);

/* size chart gender tabs */
document.querySelectorAll('.sgt-btn').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    document.querySelectorAll('.sgt-btn').forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    const gender = btn.dataset.gender;
    document.getElementById('sizeChartLaki').style.display = gender === 'laki' ? 'block' : 'none';
    document.getElementById('sizeChartMuslimah').style.display = gender === 'muslimah' ? 'block' : 'none';
  });
});

/* scroll reveal */
const revealEls = document.querySelectorAll('.reveal');
const io = new IntersectionObserver((entries)=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('visible');
      io.unobserve(entry.target);
    }
  });
}, {threshold:0.15});
revealEls.forEach(el=>io.observe(el));
</script>
</body>
</html>
