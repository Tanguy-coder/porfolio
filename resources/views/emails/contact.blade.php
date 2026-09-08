<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background:#0a0e1a;font-family:'Segoe UI',Arial,sans-serif;-webkit-font-smoothing:antialiased;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#0a0e1a;padding:40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="580" cellspacing="0" cellpadding="0" style="max-width:580px;width:100%;">

                    {{-- Logo / Brand --}}
                    <tr>
                        <td align="center" style="padding-bottom:32px;">
                            <table role="presentation" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="background:linear-gradient(135deg,#00d4ff,#ff6b35);-webkit-background-clip:text;padding:0;">
                                        <span style="font-size:28px;font-weight:800;color:#00d4ff;letter-spacing:-0.5px;">MH.</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Main card --}}
                    <tr>
                        <td>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#0f1525;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,0.06);">

                                {{-- Header gradient bar --}}
                                <tr>
                                    <td style="height:4px;background:linear-gradient(90deg,#00d4ff,#ff6b35);"></td>
                                </tr>

                                {{-- Title --}}
                                <tr>
                                    <td style="padding:32px 36px 0;">
                                        <table role="presentation" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="width:44px;height:44px;background:rgba(0,212,255,0.1);border-radius:12px;text-align:center;vertical-align:middle;font-size:20px;">
                                                    &#9993;
                                                </td>
                                                <td style="padding-left:16px;">
                                                    <div style="font-size:20px;font-weight:700;color:#ffffff;line-height:1.3;">Nouveau message</div>
                                                    <div style="font-size:13px;color:#6b7280;margin-top:2px;">Formulaire de contact portfolio</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                {{-- Divider --}}
                                <tr>
                                    <td style="padding:24px 36px 0;">
                                        <div style="height:1px;background:rgba(255,255,255,0.06);"></div>
                                    </td>
                                </tr>

                                {{-- Sender info --}}
                                <tr>
                                    <td style="padding:24px 36px 0;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                {{-- Name --}}
                                                <td width="50%" style="vertical-align:top;padding-right:12px;">
                                                    <div style="font-size:10px;text-transform:uppercase;letter-spacing:1.5px;color:#00d4ff;font-weight:600;margin-bottom:6px;">Nom</div>
                                                    <div style="font-size:15px;color:#e5e7eb;font-weight:500;">{{ $senderName }}</div>
                                                </td>
                                                {{-- Email --}}
                                                <td width="50%" style="vertical-align:top;padding-left:12px;">
                                                    <div style="font-size:10px;text-transform:uppercase;letter-spacing:1.5px;color:#00d4ff;font-weight:600;margin-bottom:6px;">Email</div>
                                                    <div style="font-size:15px;">
                                                        <a href="mailto:{{ $senderEmail }}" style="color:#e5e7eb;text-decoration:none;font-weight:500;">{{ $senderEmail }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                {{-- Subject --}}
                                @if($mailSubject)
                                <tr>
                                    <td style="padding:20px 36px 0;">
                                        <div style="font-size:10px;text-transform:uppercase;letter-spacing:1.5px;color:#00d4ff;font-weight:600;margin-bottom:6px;">Sujet</div>
                                        <div style="font-size:15px;color:#e5e7eb;font-weight:500;">{{ $mailSubject }}</div>
                                    </td>
                                </tr>
                                @endif

                                {{-- Message --}}
                                <tr>
                                    <td style="padding:24px 36px 0;">
                                        <div style="font-size:10px;text-transform:uppercase;letter-spacing:1.5px;color:#00d4ff;font-weight:600;margin-bottom:10px;">Message</div>
                                        <div style="background:rgba(0,212,255,0.04);border:1px solid rgba(0,212,255,0.1);border-radius:12px;padding:20px 24px;">
                                            <div style="font-size:15px;color:#d1d5db;line-height:1.7;white-space:pre-wrap;">{{ $body }}</div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Reply button --}}
                                <tr>
                                    <td style="padding:28px 36px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="border-radius:10px;background:linear-gradient(135deg,#00d4ff,#00b4d8);">
                                                    <a href="mailto:{{ $senderEmail }}" style="display:inline-block;padding:12px 28px;font-size:14px;font-weight:700;color:#0a0e1a;text-decoration:none;letter-spacing:0.3px;">
                                                        Répondre à {{ $senderName }}
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding:28px 20px 0;">
                            <div style="font-size:12px;color:#4b5563;line-height:1.6;">
                                Ce message a été envoyé depuis le formulaire de contact de votre portfolio.<br>
                                <span style="color:#6b7280;">{{ now()->format('d/m/Y à H:i') }}</span>
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
