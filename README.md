# Tic_tac_toe_Peerawat
SETUP 
  ลง Databaase ใน folder db
Config database ใน folder classes ในไฟล์ชื่อ Database.php
ในไฟล์ชื่อ config.php บรรทัดที่ 21 และ 22
 @define(DOCUMENTROOT , $_SERVER['DOCUMENT_ROOT'] . "/ชื่อfolder/views/");
 @define(SITEROOT , $protocol . $_SERVER['HTTP_HOST'] . "/ชื่อfolder"."/");
ในไฟล์ชื่อ configAction.js บรรทัดที่ 14
 var root = location.protocol + '//' + location.host +'/ชื่อfolder/'; // offline
 
 หน้าแรก เป็น หน้าเมนูเลือกว่าจะเล่นกับผู้เล่นกันเองหรือ AI หรือ จะดูเกมย้อนหลัง
 เมื่อกดเล่น จะมี popup เด้งขึ้นมาเลือกขนาดตารางของเกม โดย ขนาดจะไม่ต่ำกว่า 3 
เมื่อกดตกลง โปรแกรม จะเก็บข้อมูลเกมลง database และ สร้าตารางขึ้นมา ตารางแต่ละช่องจะเก็บเลขไว้ 1-n 
และ สร้า array 2 มิติ เก็บค่าว่างไว้ตามจำวนตารางบนบอร์ด
เมื่อเรากด ช่องในตาราง ระบบ จะเก็ยเลขเทิร์น และ ค่าช่อง นั้นลงdatabase แล้วเอาค่าช่องนั้นมา หา row และ colum
เพิ่มข้อมูลลงใน array และเก็บค่าช่องนั้นเข้า database 
โดย colum = เลขช่อง % ขนาดตาราง และ row= (เลขช่อง - col)/ขนาดตาราง
แล้วจึงไปเช็คเงื่อนไขการชนะ
การชนะ มี 4 วิธี 
1 ใน row เป็นตัวเดียวกันทั้งหมด
เมื่อได้ row มาแล้ว โปรแกรมจะ loop ดู row นั้นๆ ว่าเป็นตัวเดียวกันหมดไหม
2 ใน col เป็นตัวเดียวกันทั้งหมด
เมื่อได้ col มาแล้ว โปรแกรมจะ loop ดู col นั้นๆ ว่าเป็นตัวเดียวกันหมดไหม
3 ใน ทางเฉียงขวาเป็นตัวเดียวกันทั้งหมด
จะเช็คตำแหน่งที่ row col เท่ากันว่าเป็นตัวเดียวกันไหม
4 ใน ทางเฉียงซ้ายเป็นตัวเดียวกันทั้งหมด
จะเช็คตำแหน่ง rowที่ N +ไปเรื่อยๆจนสุดขนาดของตาราง col ตำแหน่งที่สุดขอบตาราง-row  เท่ากันว่าเป็นตัวเดียวกันไหม
ถ้ายังไม่มีผู้ชนะ จะสลับฝั่งผู้เล่น

ส่วนของ AI เมื่อ เริ่มเกม AI จะมีข้อมูลเลขทุกช่องในตาราง เก็บไว้เป็น array เมื่อผู้เล่นเลือกช่อง ข้อมูลเลขในช่องนั้น  AI จะเลือกจะถูกลบ ออกไปจะลบข้อมูลออกไป การเลือกช่อง ของ Ai ใช้random ข้อมูลช่องที่ยังว่างอยู่

Replay history
ดึงข้อมูล เกม ตำแหน่งที่เดินและเทิร์นจาก database กดปุ่ม next เพื่อ ไปเทิร์น ถัดไป และปุ่ม prev เพื่อย้อนกับไปดูเทิร์นที่แล้ว
