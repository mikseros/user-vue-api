<template>
  <div class="team">
      <div class="team-members table">
          <div class="table-header table-row">
              <div class="table-col">Name</div>
              <div class="table-col">Email</div>
              <div class="table-col table-actions">Actions</div>
          </div>
          <div class="member table-row">
              <div class="table-col name">Mike Tyson</div>
              <div class="table-col email">iron_mike@gmail.com</div>
              <div class="table-col actions">
                  <div class="button-group group-end">
                      <button class="button button-small">Update</button>
                      <button class="button button-small button-alert">Delete</button>
                  </div>
              </div>
          </div>
          <div class="member table-row">
              <div class="table-col name">Tony Montana</div>
              <div class="table-col email">antonio_monti@gmail.com</div>
              <div class="table-col actions">
                  <div class="button-group group-end">
                      <button class="button button-small">Update</button>
                      <button class="button button-small button-alert">Delete</button>
                  </div>
              </div>
          </div>
          <div class="member table-row">
              <div class="table-col name">Rambo</div>
              <div class="table-col email">rambambo@gmail.com</div>
              <div class="table-col actions">
                  <div class="button-group group-end">
                      <button class="button button-small">Update</button>
                      <button class="button button-small button-alert">Delete</button>
                  </div>
              </div>
          </div>
          <div class="member table-row">
              <div class="table-col name">King Kong</div>
              <div class="table-col email">king-kong@gmail.com</div>
              <div class="table-col actions">
                  <div class="button-group group-end">
                      <button class="button button-small">Update</button>
                      <button class="button button-small button-alert">Delete</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>
.team {
    padding: 16px;
}

.table-row {
    display: flex;
    align-items: center;
}

.table-col {
    flex: 1 1 33.333%;
    padding: 16px;
    color: var(--grey);
}

.table-row {
    background-color: #FFF;
}

.table-row:nth-child(2n+1) {
    background-color: var(--light-alt);
}

.table .table-header {
    background-color: var(--dark);
}

.table .table-header .table-col {
    color: var(--light);
}

.table-actions {
    text-align: right;
}
</style>