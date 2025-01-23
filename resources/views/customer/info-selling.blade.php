@extends('layouts.user')

@section('title', 'How To Sell')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <div class="container p-4">

            <div class="row">
                <div class="col text-secondary">
                    <i class="bi bi-clock-history"></i>
                    latest update
                    {{-- {{ $product['updated_at'] ? $product['updated_at'] : $product['created_at'] }} --}}
                </div>

                <hr>

                <br>
                <h4 class="text py-2 bg-white">How to Start Selling ?</h4>

                <hr>

                <div class="accordion accordion-flush" id="accordionInfoSelling">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                ขายของในสุภัสสโตร์มีกี่ขั้นตอน ?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionInfoSelling">
                            <div class="accordion-body">
                                <h5>ถ้าอยากขายของออนไลน์ต้องขายในสุภัสสโตร์ ขั้นตอนการขายในสุภัสสโตร์ง่ายๆเพียง 4 ขั้นตอน</h5>
                                <p>1. กรอกเบอร์โทรศัพท์</p>
                                <p>2. กรอกอีเมลและที่อยู่</p>
                                <p>3. ส่งเอกสารยืนยันตัวตน</p>
                                <p>4. ลงสินค้าขั้นตํ่า 1 ชิ้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                อยู่กับเราได้มากกว่าที่คิด
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionInfoSelling">
                            <div class="accordion-body">
                                <p>ขายของในสุภัสสโตร์เพิ่มโอกาสให้สินค้าของคุณถูกเห็นมากขึ้นบนแพลตฟอร์มสุภัสสโตร์
                                    เพราะว่าเราคือแพลตฟอร์ม E-Commerce
                                    ที่เหมาะขายของออนไลน์และที่ใหญ่ที่สุดในภูมิภาคอาเซียน</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                ง่ายดายอย่างไม่น่าเชื่อ
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionInfoSelling">
                            <div class="accordion-body">
                                <p>แอปพลิเคชันบนมือถือที่ทำให้สามารถจัดการการขายของในสุภัสสโตร์
                                    จัดการธุรกิจของคุณได้ทุกที่ทุกเวลา
                                    สมัครง่ายๆที่ทำให้คุณสามารถเริ่มต้นขายของออนไลน์ เริ่มต้นขายสินค้าได้ในไม่กี่นาที
                                    เรามีบริการครอบคลุมตั้งแต่ลูกค้าไปจนถึงการจัดส่งที่คอยสนับสนุนคุณ</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                เราช่วยสนับสนุนการขายของคุณให้ดียิ่งขึ้น
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            data-bs-parent="#accordionInfoSelling">
                            <div class="accordion-body">
                                <p>ด้วยฟีเจอร์ ‘การวิเคราะห์ธุรกิจ’,
                                    คุณสามารถเข้าถึงข้อมูลเชิงลึกของสินค้าคุณและร้านค้าคุณที่ขายของในสุภัสสโตร์
                                    ได้แบบเรียลไทม์ อีกทั้งคุณสามารถศึกษา, อัปเดตข้อมูลและความรู้ได้ตลอดเวลา</p>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn btn-danger btn-lg shadow-md my-5">Start Selling!</a>
            </div>
        </div>

    </div>
@endsection
