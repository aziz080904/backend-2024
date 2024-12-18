/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
    console.log("Download selesai");
    console.log(`Hasil Download: ${result}`);
  };
  
  /**
   * Fungsi untuk download file dengan Promise
   * @returns {Promise<string>}
   */
  const download = () => {
    return new Promise((resolve) => {
      setTimeout(() => {
        const result = "windows-10.exe";
        resolve(result);
      }, 3000);
    });
  };
  
  /**
   * Menggunakan async/await untuk menjalankan download dan menampilkan hasil
   */
  const startDownload = async () => {
    console.log("Memulai download...");
    const result = await download();
    showDownload(result);
  };
  
  startDownload();
  