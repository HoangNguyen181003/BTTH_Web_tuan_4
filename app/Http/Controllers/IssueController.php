<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Models\Computer;
class IssueController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ bảng `issues` và kết nối với bảng `computers`
        $issues = Issue::join('computers', 'issues.computer_id', '=', 'computers.id')
            ->select(
                'issues.id as issue_id',
                'computers.computer_name',
                'computers.model',
                'issues.reported_by',
                'issues.reported_date',
                'issues.urgency',
                'issues.status'
            )
            ->paginate(10); // Phân trang với 10 bản ghi mỗi trang

        return view('issues.index', compact('issues'));
    }

        // Hiển thị form thêm vấn đề
    public function create()
        {
            // Lấy tất cả các máy tính để người dùng chọn
            $computers = Computer::all();
            return view('issues.create', compact('computers'));
        }
    
        // Xử lý việc lưu vấn đề mới
    public function store(Request $request)
        {
            // Kiểm tra dữ liệu từ form
            $validated = $request->validate([
                'computer_id' => 'required|exists:computers,id',
                'reported_by' => 'required|string|max:50',
                'reported_date' => 'required|date',
                'description' => 'required|string',
                'urgency' => 'required|in:Low,Medium,High',
                'status' => 'required|in:Open,In Progress,Resolved',
            ]);
    
            // Tạo một vấn đề mới và lưu vào cơ sở dữ liệu
            Issue::create([
                'computer_id' => $validated['computer_id'],
                'reported_by' => $validated['reported_by'],
                'reported_date' => $validated['reported_date'],
                'description' => $validated['description'],
                'urgency' => $validated['urgency'],
                'status' => $validated['status'],
            ]);
    
            // Chuyển hướng người dùng về trang danh sách vấn đề
            return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
        }
    
    public function edit($id)
        {
            // Lấy thông tin vấn đề và danh sách máy tính
            $issue = Issue::findOrFail($id); // Tìm vấn đề theo ID
            $computers = Computer::all(); // Lấy danh sách máy tính
    
            return view('issues.edit', compact('issue', 'computers'));
        }
    
        // Xử lý cập nhật thông tin vấn đề
    public function update(Request $request, $id)
        {
            // Kiểm tra dữ liệu từ form
            $validated = $request->validate([
                'computer_id' => 'required|exists:computers,id',
                'reported_by' => 'required|string|max:50',
                'reported_date' => 'required|date',
                'description' => 'required|string',
                'urgency' => 'required|in:Low,Medium,High',
                'status' => 'required|in:Open,In Progress,Resolved',
            ]);
    
            // Cập nhật thông tin vấn đề trong cơ sở dữ liệu
            $issue = Issue::findOrFail($id); // Tìm vấn đề cần cập nhật
            $issue->update([
                'computer_id' => $validated['computer_id'],
                'reported_by' => $validated['reported_by'],
                'reported_date' => $validated['reported_date'],
                'description' => $validated['description'],
                'urgency' => $validated['urgency'],
                'status' => $validated['status'],
            ]);
    
            // Chuyển hướng về trang danh sách và thông báo thành công
            return redirect()->route('issues.index')->with('success', 'Cập nhật vấn đề thành công!');
        }   

        public function confirmDelete($id)
        {
            // Lấy thông tin vấn đề theo ID
            $issue = Issue::findOrFail($id);
            
            return view('issues.confirm_delete', compact('issue'));
        }
    
        // Xóa vấn đề
        public function destroy($id)
        {
            // Tìm và xóa vấn đề
            $issue = Issue::findOrFail($id);
            $issue->delete();
    
            // Quay lại trang danh sách vấn đề với thông báo thành công
            return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa!');
        }        
}
