<?php
require_once __DIR__ . '/includes/header.php';
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3>🏢 Members Management</h3>
        <button class="btn btn-primary" onclick="openAddModal()">+ Add New Member</button>
    </div>

    <div id="alertArea"></div>

    <table id="membersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Industry</th>
                <th>Province</th>
                <th>Stakeholder</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="7">Loading...</td></tr>
        </tbody>
    </table>
</div>

<!-- Add/Edit Modal -->
<div class="modal" id="memberModal">
    <div class="modal-content">
        <h3 id="modalTitle">Add New Member</h3>
        <form id="memberForm">
            <input type="hidden" id="memberId">

            <div class="form-group">
                <label>Company Name *</label>
                <input type="text" id="name" required>
            </div>

            <div class="form-group">
                <label>Industry *</label>
                <select id="industry_id" required></select>
            </div>

            <div class="form-group">
                <label>Province *</label>
                <select id="province_id" required></select>
            </div>

            <div class="form-group">
                <label>Stakeholder</label>
                <select id="stakeholder">
                    <option value="">None (General)</option>
                    <option value="CZI">CZI</option>
                    <option value="CIFOZ">CIFOZ</option>
                </select>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" id="phone">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email">
            </div>

            <div class="form-group">
                <label>Website</label>
                <input type="text" id="website">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea id="description"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select id="is_active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="button" class="btn" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Load members on page load
    loadMembers();
    loadDropdowns();

    async function loadMembers() {
        try {
            const response = await fetch('/industry.co.zw/admin/api/members.php');
            const data = await response.json();

            if (data.status === 'success') {
                displayMembers(data.data);
            }
        } catch (error) {
            console.error('Error loading members:', error);
        }
    }

    function displayMembers(members) {
        const tbody = document.querySelector('#membersTable tbody');

        if (members.length === 0) {
            tbody.innerHTML = '<tr><td colspan="7">No members found</td></tr>';
            return;
        }

        tbody.innerHTML = members.map(member => `
            <tr>
                <td>${member.id}</td>
                <td><strong>${member.name}</strong></td>
                <td>${member.industry_name}</td>
                <td>${member.province_name}</td>
                <td>
                    ${member.stakeholder ?
                        `<span class="badge badge-${member.stakeholder.toLowerCase()}">${member.stakeholder}</span>` :
                        '<span class="badge">General</span>'}
                </td>
                <td>
                    <span class="badge ${member.is_active == 1 ? 'badge-active' : 'badge-inactive'}">
                        ${member.is_active == 1 ? 'Active' : 'Inactive'}
                    </span>
                </td>
                <td>
                    <button class="btn btn-info" onclick="editMember(${member.id})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteMember(${member.id})">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    async function loadDropdowns() {
        // Load industries
        try {
            const response = await fetch('/industry.co.zw/api/public/industries.php');
            const data = await response.json();

            if (data.status === 'success') {
                const industrySelect = document.getElementById('industry_id');
                industrySelect.innerHTML = '<option value="">Select Industry</option>' +
                    data.data.map(ind => `<option value="${ind.id}">${ind.name}</option>`).join('');
            }
        } catch (error) {
            console.error('Error loading industries:', error);
        }

        // Load provinces
        try {
            const response = await fetch('/industry.co.zw/api/public/provinces.php');
            const data = await response.json();

            if (data.status === 'success') {
                const provinceSelect = document.getElementById('province_id');
                provinceSelect.innerHTML = '<option value="">Select Province</option>' +
                    data.data.map(prov => `<option value="${prov.id}">${prov.name}</option>`).join('');
            }
        } catch (error) {
            console.error('Error loading provinces:', error);
        }
    }

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Add New Member';
        document.getElementById('memberForm').reset();
        document.getElementById('memberId').value = '';
        document.getElementById('memberModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('memberModal').style.display = 'none';
    }

    async function editMember(id) {
        try {
            const response = await fetch(`/industry.co.zw/admin/api/members.php?id=${id}`);
            const data = await response.json();

            if (data.status === 'success') {
                const member = data.data;
                document.getElementById('modalTitle').textContent = 'Edit Member';
                document.getElementById('memberId').value = member.id;
                document.getElementById('name').value = member.name;
                document.getElementById('industry_id').value = member.industry_id;
                document.getElementById('province_id').value = member.province_id;
                document.getElementById('stakeholder').value = member.stakeholder || '';
                document.getElementById('phone').value = member.phone || '';
                document.getElementById('email').value = member.email || '';
                document.getElementById('website').value = member.website || '';
                document.getElementById('description').value = member.description || '';
                document.getElementById('is_active').value = member.is_active;
                document.getElementById('memberModal').style.display = 'block';
            }
        } catch (error) {
            showAlert('Error loading member details', 'error');
        }
    }

    async function deleteMember(id) {
        if (!confirmDelete('Are you sure you want to delete this member?')) {
            return;
        }

        try {
            const response = await fetch(`/industry.co.zw/admin/api/members.php?id=${id}`, {
                method: 'DELETE'
            });
            const data = await response.json();

            if (data.status === 'success') {
                showAlert('Member deleted successfully');
                loadMembers();
            } else {
                showAlert('Failed to delete member', 'error');
            }
        } catch (error) {
            showAlert('Error deleting member', 'error');
        }
    }

    // Handle form submission
    document.getElementById('memberForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const memberId = document.getElementById('memberId').value;
        const formData = {
            name: document.getElementById('name').value,
            industry_id: document.getElementById('industry_id').value,
            province_id: document.getElementById('province_id').value,
            stakeholder: document.getElementById('stakeholder').value || null,
            phone: document.getElementById('phone').value || null,
            email: document.getElementById('email').value || null,
            website: document.getElementById('website').value || null,
            description: document.getElementById('description').value || null,
            is_active: document.getElementById('is_active').value
        };

        const url = memberId ?
            `/industry.co.zw/admin/api/members.php?id=${memberId}` :
            '/industry.co.zw/admin/api/members.php';

        const method = memberId ? 'PUT' : 'POST';

        try {
            const response = await fetch(url, {
                method: method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const data = await response.json();

            if (data.status === 'success') {
                showAlert(memberId ? 'Member updated successfully' : 'Member added successfully');
                closeModal();
                loadMembers();
            } else {
                showAlert(data.message || 'Operation failed', 'error');
            }
        } catch (error) {
            showAlert('Error saving member', 'error');
        }
    });

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target == document.getElementById('memberModal')) {
            closeModal();
        }
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>