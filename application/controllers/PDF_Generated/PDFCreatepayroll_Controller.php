<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('assets/fpdf/fpdf.php');


class PDFCreatepayroll_Controller extends CI_Controller {
        public function Payroll_pdf(){
            
            $SalesRep_name = $this->input->post('txtforms_fullname');
            $Month = $this->input->post('monthSelect');
            $Period = $this->input->post('periodSelect');
            $Year = $this->input->post('yearSelect');
            $Bonus = $this->input->post('txtform_bonus');
            $Currentdate = date('F j, Y');
            $ClientNames = $this->input->post('txtForms_clientname');
            $sales_repdata = $this->function->salesrep_data($SalesRep_name);
            $OnlineinsureCommission = $this->input->post('txtForms_onlinecommission');
            $CommissionRate = $sales_repdata->commission_rate / 100;
            $Bonusnew = $Bonus * 2;
            $commissionDeducted = $OnlineinsureCommission * $CommissionRate;
            $TaxRate = $sales_repdata->tax_rate / 100;
            $TaxDeducted = $OnlineinsureCommission * $TaxRate;
            $Netpay = ($OnlineinsureCommission + $Bonusnew - ($commissionDeducted + $TaxDeducted ));

            $pdf = new FPDF('P', 'mm', 'A4');

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('times', 'B', 20);
            $pdf->SetY(10);
            $pdf->cell(190, 10, 'Online Generated Payroll System', '',0,'C');
            $pdf->SetFont('times', '', 14);
            $pdf->SetY(23);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->cell(95, 10, 'Sales Representative Name : '.$SalesRep_name, '',0,'L',TRUE);
            $pdf->Cell(95, 10, 'Date: ' . $Currentdate, '', 0, 'R', TRUE);
            $pdf->SetTextColor(0, 0, 0); 
            $pdf->SetFont('times', '', 12);
            $pdf->SetY(35);
            $pdf->SetX(140);
            $pdf->SetFont('times', 'B', 12);
            $pdf->cell(40, 10, 'For the Period of '.$Month.', '.$Period.' '.$Year, '',0,'C');
            $pdf->SetFont('times', '', 12);
            $pdf->SetY(42);
            $pdf->SetX(127);
            $pdf->MultiCell(70, 4, 'Note: This will be release 5 days from the Current Date '.$Currentdate,0,'L');
            $pdf->SetY(35);
            $pdf->SetFont('times', 'B', 12);
            $pdf->cell(40, 10, 'Produced by :', '',0,'C');
            $pdf->SetFont('times', '', 12);
            $pdf->SetY(43);
            $pdf->SetX(17);
            $pdf->cell(70, 4, 'Eliteinsure Limited','',1,'C');
            $pdf->SetX(18);
            $pdf->cell(70, 4, '1C/39 Mackelvie Street Grey Lynn','',1,'C');
            $pdf->SetX(17);
            $pdf->cell(70, 4, '+6493789676','',1,'C');
            $pdf->SetX(17);
            $pdf->cell(70, 4, 'www.eliteinsure.co.nz','',1,'C');

            $pdf->SetFont('times', '', 14);
            $pdf->SetY(65);
            $pdf->SetFillColor(200, 200, 200);
            $pdf->SetFont('times', 'B', 12);
            $pdf->cell(190, 10, 'CLIENT LIST', 'LTRB',0,'C',TRUE);
            $pdf->SetFont('times', '', 12);
            $pdf->SetTextColor(0, 0, 0); 
            $pdf->SetY(75);
            foreach ($ClientNames as $index => $clientName) {
                $pdf->cell(190, 10, 'Client ' . ($index + 1) . ': ' . $clientName, 'LTRB',1,'C',);
            }

            $pdf->SetY($pdf->GetY() + 10); 
            $pdf->SetFillColor(200, 200, 200);
            $pdf->SetFont('times', 'IB', 12);
            $pdf->Cell(190, 10, 'PAYROLL BREAKDOWN', 'LTRB', 1, 'C', TRUE);
            $pdf->Cell(95, 10, 'Description', 'LTRB', 0, 'C');
            $pdf->Cell(95, 10, 'Amount', 'LTRB', 1, 'C');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(95, 10, 'Gross Salary', 'LTRB', 0, 'C');
            $pdf->Cell(95, 10, '$'.$OnlineinsureCommission, 'LTRB', 1, 'C');
            $pdf->Cell(95, 10, 'Bonus', 'LTRB', 0, 'C');
            $pdf->Cell(95, 10, '$'.$Bonusnew, 'LTRB', 1, 'C');
            $pdf->SetFont('times', 'IB', 12);
            $pdf->Cell(190, 10, 'Deduction', 'LTRB', 1, 'C',TRUE);
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(95, 10, 'Insure Commission Rate', 'LTRB', 0, 'C');
            $pdf->Cell(95, 10, '$'.$commissionDeducted, 'LTRB', 1, 'C');
            $pdf->Cell(95, 10, 'Tax Rate', 'LTRB', 0, 'C');
            $pdf->Cell(95, 10, '$'.$TaxDeducted , 'LTRB', 1, 'C');
            $pdf->SetFont('times', 'IB', 12);
            $pdf->Cell(95, 10, 'Net Pay', 'LTRB', 0, 'C',TRUE);
            $pdf->Cell(95, 10, '$'.$Netpay , 'LTRB', 0, 'C',TRUE);
            $pdf->SetFont('times', '', 12);
            $pdf->SetTextColor(0, 0, 0); 

            $filename = $SalesRep_name.' '.'payroll.pdf';
            $pdf->Output('D', $filename);

            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ellosomarlon47@gmail.com';
            $mail->Password = 'ogaxhvnpnnbekhpl';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;
            
            $mail->setFrom('ellosomarlon47@gmail.com', 'Payroll Notification');
            $mail->addAddress('slsuresearcher@gmail.com');
            $mail->Subject = 'Generated Payroll '.$SalesRep_name;
            $mail->isHTML(true);
            $mailContent = "
                    <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
                        <tr>
                          <td align='center' style='padding:0;'>
                            <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
                              <tr>
                                <td align='center' style='padding:40px 0 30px 0;background:#47ac60;'>
                                    <h2 style='color: #ffffff;font-family:Arial,sans-serif;'>Online Generated Payroll</h2>
                                </td>
                              </tr>
                              <tr>
                                <td style='padding:36px 30px 42px 30px;'>
                                  <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                    <tr>
                                      <td style='padding:0 0 36px 0;color:#153643;'>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                            <strong>Dear HR Admin:</strong><br /><br />
                                            Payroll was already generated for".$SalesRep_name.".
                                        </p>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>";
            $mail->Body = $mailContent;
            if(!$mail->send()){
                
            } else {
               
            }
            // redirect(base_url( 'UserProposals.aspx' ));
            // $this->session->set_flashdata('error_msg', 'Failed to Research Account');
            
    }
         
        
 
}
